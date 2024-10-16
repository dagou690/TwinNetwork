from django.db import models
from django.core.validators import MinLengthValidator, RegexValidator

class Utilisateur(models.Model):
    nom = models.CharField(max_length=100, validators=[
        RegexValidator(r'^[a-zA-Z]+$', 'Le nom ne doit contenir que des lettres.')
    ])
    prenom = models.CharField(max_length=100, validators=[
        RegexValidator(r'^[a-zA-Z ]+$', 'Le prénom ne doit contenir que des lettres.')
    ])
    email = models.EmailField(unique=True)  # Validation automatique de l'email
    contact = models.CharField(max_length=10, validators=[
        RegexValidator(r'^07\d{8}$', 'Le contact doit être un numéro valide de Côte d\'Ivoire commençant par 07.')
    ])

    alumni = models.BooleanField(default=False)  # True si "Oui", False si "Non"
    NIVEAU_CHOICES = [
        ('L1', 'Licence 1'),
        ('L2', 'Licence 2'),
        ('L3', 'Licence 3'),
    ]
    niveau = models.CharField(max_length=2, choices=NIVEAU_CHOICES)
    mot_de_passe = models.CharField(max_length=100, validators=[MinLengthValidator(8)])

    def __str__(self):
        return f"{self.nom} {self.prenom}"
