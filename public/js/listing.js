                document.addEventListener("DOMContentLoaded", function () {
                    const livraisonSelects = document.querySelectorAll(".livraisonSelect");
                    const longueurSelects = document.querySelectorAll(".longueurSelect");
                    const quantiteInputs = document.querySelectorAll(".quantite");
                    const priceDisplay = document.querySelectorAll(".priceDisplay");

                    livraisonSelects.forEach((livraisonSelect, index) => {
                        livraisonSelect.addEventListener("change", function () {
                            updateLongueurOptions(index);
                            updatePrice(index);
                        });
                    });

                    longueurSelects.forEach((longueurSelect, index) => {
                        longueurSelect.addEventListener("change", () => updatePrice(index));
                    });

                    quantiteInputs.forEach((quantiteInput, index) => {
                        quantiteInput.addEventListener("input", () => updatePrice(index));
                    });



                    function updatePrice(index) {
                        const selectOptionLongueur = parseFloat(longueurSelects[index].value);
                        const quantite = parseInt(quantiteInputs[index].value) || 0;
                        const prixUnitaire = selectOptionLongueur;
                        
                        const totalPrice = prixUnitaire * quantite;

                        priceDisplay[index].textContent = totalPrice.toFixed(2) + " €";

                        const prixfinal = document.querySelectorAll(".prixfinal")[index];
                        prixfinal.value = prixUnitaire;
                    }

                    // change le prix si l'utilisateur choisi l'option Livraison
                    function updateLongueurOptions(index) {
                        const selectedLivraisonValue = livraisonSelects[index].value;


                        if (selectedLivraisonValue === "{{ item.livraisonpremierprix }}") {
                            longueurSelects[index].innerHTML = `
                                {% if item.premierelongueur is not null and item.premierelongueur is not empty %}
                                    <option value="{{ item.surplacepremierprix }}">{{ item.premierelongueur }}</option>
                                {% endif %}
                                {% if item.deuxiemelongueur is not null and item.deuxiemelongueur is not empty %}
                                    <option value="{{ item.surplacedeuxiemeprix }}">{{ item.deuxiemelongueur }}</option>
                                {% endif %}
                                {% if item.troisiemelongueur is not null and item.troisiemelongueur is not empty %}
                                    <option value="{{ item.surplacetroisiemeprix }}">{{ item.troisiemelongueur }}</option>
                                {% endif %}
                            `;
                        } else if (selectedLivraisonValue === "{{ item.livraisondeuxiemeprix }}") {
                            longueurSelects[index].innerHTML = `
                                {% if item.premierelongueur is not null and item.premierelongueur is not empty %}
                                    <option value="{{ item.livraisonpremierprix }}">{{ item.premierelongueur }}</option>
                                {% endif %}
                                {% if item.deuxiemelongueur is not null and item.deuxiemelongueur is not empty %}
                                    <option value="{{ item.livraisondeuxiemeprix }}">{{ item.deuxiemelongueur }}</option>
                                {% endif %}
                                {% if item.troisiemelongueur is not null and item.troisiemelongueur is not empty %}
                                    <option value="{{ item.livraisontroisiemeprix }}">{{ item.troisiemelongueur }}</option>
                                {% endif %}
                            `;
                        }
                    }
                });