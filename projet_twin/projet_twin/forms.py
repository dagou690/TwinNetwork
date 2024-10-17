from django import forms
from .models import Utilisateur

# Premier formulaire (comme celui que tu as déjà créé)
class UtilisateurForm(forms.ModelForm):
    class Meta:
        model = Utilisateur
        fields = ['nom', 'prenom', 'email', 'contact']
    
# Deuxième formulaire

class SecondForm(forms.ModelForm):
    alumni = forms.ChoiceField(choices=[('oui', 'Oui'), ('non', 'Non')], label="Alumni ?", 
                               error_messages={'required': 'faites un choix.'})
    niveau = forms.ChoiceField(choices=[('L1', 'Licence 1'), ('L2', 'Licence 2'), ('L3', 'Licence 3')], label="Niveau", 
                               error_messages={'required': 'Veuillez sélectionner votre niveau.'})
    mot_de_passe = forms.CharField(widget=forms.PasswordInput(), label="Mot de passe",
                                   min_length=8, error_messages={
                                       'required': 'Le mot de passe est requis.',
                                       'min_length': 'Le mot de passe doit contenir au moins 8 caractères.'
                                   })
    confirmer_mdp = forms.CharField(widget=forms.PasswordInput(), label="Confirmer le mot de passe",
                                    error_messages={
                                        'required': 'Veuillez confirmer votre mot de passe.'
                                    })

    class Meta:
        model = Utilisateur  # Le modèle utilisé
        fields = ['alumni', 'niveau', 'mot_de_passe']  # Les champs à afficher

    def clean(self):
        cleaned_data = super().clean()
        mdp = cleaned_data.get("mot_de_passe")
        confirmer_mdp = cleaned_data.get("confirmer_mdp")

        if mdp != confirmer_mdp:
            self.add_error('confirmer_mdp', 'Les mots de passe ne correspondent pas.')

        # Convertir le champ alumni en booléen
        alumni_value = cleaned_data.get("alumni")
        cleaned_data['alumni'] = (alumni_value == 'oui')

        return cleaned_data