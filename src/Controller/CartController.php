<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Component\Mime\Email;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/cart', name: 'cart_')]
class CartController extends AbstractController
{

    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function inde(
        SessionInterface $session,
        ProductsRepository $productsRepository,
        Request $request,
    ): Response
    {

        $panier = $session->get('panier', []);

        $data = [];
        $total = 0;

        foreach ($panier as $id => $element) {
            $product = $productsRepository->find($id);
            $quantite = $element['quantite'];
            $prixFinal = $element['prixFinal'];
            
            $data[] = [
                'product' => $product,
                'quantite' => $quantite,
                'prixFinal' => $prixFinal,
            ];
            // On calcule le total pour chaque produit et on l'ajoute au total général
            $total += $prixFinal * $quantite;
        }
        
        return $this->render('cart/index.html.twig', compact('data', 'total'));
    }

    #[Route('/add/{id}', name: 'add')]
    public function add(
        
        Products $products,
        SessionInterface $session,
        Request $request
    ): Response
    {
        // on récupère l'id du produit
        $id = $products->getId();

        // on récupère le panier actuel
        $panier = $session->get('panier', []);

        $quantite = $request->request->get('quantite');
        $prixFinal = $request->request->get('prixfinal');


        // on ajoute le produit dans le paneir s'il n'y est pas encore
        // sinon on incrémente sa quantité
        if (empty($panier[$id])) {
            // Si le produit n'est pas encore dans le panier, on l'ajoute avec la quantité spécifiée
            $panier[$id] = [
                'quantite' => $quantite,
                'prixFinal' => $prixFinal
            ];
        } else {
            // Si le produit est déjà dans le panier, on ajoute simplement la nouvelle quantité à la quantité existante
            $panier[$id]['quantite'] ++;
            $panier[$id]['prix_final'] = $prixFinal;
        }


        $session->set('panier', $panier);
        // on redirige vers la page du panier
        return $this->redirectToRoute('cart_index',);
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove(
        Products $products,
        SessionInterface $session,
        Request $request
    ): Response
    {
        // on récupère l'id du produit
        $id = $products->getId();

        // on récupère le panier actuel
        $panier = $session->get('panier', []);

        // on retire le produit du panier s'il n'y a qu'un exemplaire
        // sinon on decrémente sa quantité
        if (!empty($panier[$id])) {
            if($panier[$id] > 1) {
                $panier[$id]['quantite'] --;
            } else {
                unset($panier[$id]);
            }
        }

        $session->set('panier', $panier);

        // on redirige vers la page du panier
        return $this->redirectToRoute('cart_index');
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(
        Products $products,
        SessionInterface $session,
        Request $request
    ): Response
    {
        // on récupère l'id du produit
        $id = $products->getId();

        // on récupère le panier actuel
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        // on redirige vers la page du panier
        return $this->redirectToRoute('cart_index');
    }

    #[Route('/empty', name: 'empty')]
    public function empty(
        SessionInterface $session,
    ): Response
    {
        $session->remove('panier');

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/email', name: 'email')]
public function sendEmail(
    MailerInterface $mailer,
    Request $request,
    ProductsRepository $productsRepository,
    SessionInterface $session
): Response {
    // Récupérer les données soumises depuis le formulaire
    $nom = $request->request->get('nom');
    $email = $request->request->get('email');
    $telephone = $request->request->get('telephone');
    $adresse = $request->request->get('adresse');
    $ville = $request->request->get('ville');

    // Récupérer les données du panier
    $panier = $session->get('panier', []);

    // Initialiser une variable pour contenir le tableau HTML des produits dans le panier
    $produitsHtml = '<table>';
    $produitsHtml .= '<thead><tr><th>Produit</th><th>Prix</th><th>Quantité</th><th>Total</th></tr></thead>';
    $produitsHtml .= '<tbody>';

    // Calculer le total du panier
    $total = 0;

    // Parcourir chaque élément du panier
    foreach ($panier as $id => $element) {
        // Récupérer le produit depuis la base de données
        $product = $productsRepository->find($id);
        $quantite = $element['quantite'];
        $prixFinal = $element['prixFinal'];

        // Si le produit existe
        if ($product !== null) {
            // Ajouter une ligne pour le produit dans le tableau HTML
            $produitsHtml .= '<tr>';
            $produitsHtml .= '<td>' . $product->getName() . '</td>';
            $produitsHtml .= '<td>' . $prixFinal . ' €</td>';
            $produitsHtml .= '<td>' . $quantite . '</td>';
            $produitsHtml .= '<td>' . ($prixFinal * $quantite) . ' €</td>';
            $produitsHtml .= '</tr>';

            // Ajouter le prix du produit au total du panier
            $total += $prixFinal * $quantite;
        }
    }

    // Fermer le tableau HTML
    $produitsHtml .= '</tbody>';
    $produitsHtml .= '</table>';

    // Créer le contenu de l'e-mail avec les données récupérées
    $contenuEmail = "<p>Nom: $nom</p><p>Email: $email</p><p>Téléphone: $telephone</p><p>Adresse: $adresse</p><p>Ville: $ville</p>";
    $contenuEmail .= "<h2>Produits dans le panier :</h2>";
    $contenuEmail .= $produitsHtml;
    $contenuEmail .= "<p>Total du panier: $total €</p>";

    // Créer l'e-mail
    $email = (new Email())
        ->from($email)
        ->to()
        ->subject("Commande de $nom")
        ->html($contenuEmail);

    // Envoyer l'e-mail
    $mailer->send($email);

    // Réponse de confirmation
    return new Response('E-mail envoyé avec succès !');
}
}
