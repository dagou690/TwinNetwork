from django.shortcuts import render

def page1(request):
    return render(request, 'page1.html')
def form(request):
    return render(request, 'form.html')

def form2(request):
    return render(request, 'form2.html')

from django.shortcuts import render, redirect
from .forms import  UtilisateurForm
from .forms import SecondForm 
from .models import Utilisateur
def utilisateur(request):
    # Récupérer le nom de l'utilisateur depuis la session ou utiliser une valeur par défaut
    nom_utilisateur = request.session.get('nom_utilisateur', 'Invité')

    return render(request, 'utilisateur.html', {'nom_utilisateur': nom_utilisateur})



def creation_compte(request):
    if request.method == 'POST':
        form = UtilisateurForm(request.POST)
        if form.is_valid():
            # Ne pas encore sauvegarder dans la base de données
            utilisateur = form.save(commit=False)

            # Stocker les informations du formulaire dans la session
            request.session['utilisateur_nom'] = utilisateur.nom
            request.session['utilisateur_prenom'] = utilisateur.prenom
            request.session['utilisateur_email'] = utilisateur.email
            request.session['utilisateur_contact'] = utilisateur.contact

            # Rediriger vers le deuxième formulaire
            return redirect('form2')  # Redirige vers la vue form2
    else:
        form = UtilisateurForm()

    return render(request, 'form.html', {'form': form})


def form2(request):
    if request.method == 'POST':
        form = SecondForm(request.POST)
        if form.is_valid():
            # Créer une instance de Utilisateur sans l'enregistrer encore
            utilisateur = Utilisateur()

            # Récupérer les informations du premier formulaire depuis la session
            utilisateur.nom = request.session.get('utilisateur_nom')
            utilisateur.prenom = request.session.get('utilisateur_prenom')
            utilisateur.email = request.session.get('utilisateur_email')
            utilisateur.contact = request.session.get('utilisateur_contact')

            # Récupérer les données du deuxième formulaire
            utilisateur.alumni = form.cleaned_data['alumni']
            utilisateur.niveau = form.cleaned_data['niveau']
            utilisateur.mot_de_passe = form.cleaned_data['mot_de_passe']

            # Sauvegarder dans la base de données
            utilisateur.save()

            # Effacer les données de la session après avoir enregistré l'utilisateur
            request.session.flush()

            # Rediriger vers une page de succès
            return redirect('utilisateur')
        else:
            return render(request, 'form2.html', {'form': form})

    else:
        form = SecondForm()

    return render(request, 'form2.html', {'form': form})
