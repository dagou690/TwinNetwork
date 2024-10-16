from django import forms
from .models import Utilisateur

# Premier formulaire (comme celui que tu as déjà créé)
class UtilisateurForm(forms.ModelForm):
    class Meta:
        model = Utilisateur
        fields = ['nom', 'prenom', 'email', 'contact']

# Deuxième formulaire
class SecondForm(forms.Form):
    alumni = forms.ChoiceField(choices=[('oui', 'Oui'), ('non', 'Non')], label="Alumni ?")
    niveau = forms.ChoiceField(choices=[('L1', 'Licence 1'), ('L2', 'Licence 2'), ('L3', 'Licence 3')], label="Niveau")
    mot_de_passe = forms.CharField(widget=forms.PasswordInput(), label="Mot de passe")
    confirmer_mdp = forms.CharField(widget=forms.PasswordInput(), label="Confirmer le mot de passe")

    # Validation de confirmation du mot de passe
    def clean(self):
        cleaned_data = super().clean()
        mdp = cleaned_data.get("mot_de_passe")
        mdp_confirmation = cleaned_data.get("confirmer_mdp")

        if mdp != mdp_confirmation:
            raise forms.ValidationError("Les mots de passe ne correspondent pas.")
