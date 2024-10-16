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

def creation_compte(request):
    if request.method == 'POST':
        form = UtilisateurForm(request.POST)
        if form.is_valid():
            form.save()  # Enregistre les données dans la base de données
            return redirect('form2')  # Redirige vers la page du deuxième formulaire
    else:
        form = UtilisateurForm()
    
    return render(request, 'form.html', {'form': form})

def form2(request):
    # Ici, on suppose que tu as déjà un formulaire pour la deuxième partie de la soumission
    if request.method == 'POST':
        form = SecondForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('success_page')  # Redirige vers une page de succès après la soumission
    else:
        form = SecondForm()

    return render(request, 'form2.html', {'form': form})