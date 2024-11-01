<!-- authGest.php -->
<?php
session_start();

include '../dbconnect.php';

if(isset($_POST['email']) && isset($_POST['password'])) {
    $Email = $_POST['email'];
    $motpasse = $_POST['password'];

    try {
        $sql = "SELECT * FROM gestionnaire WHERE Email = :Email AND motpasse = :motpasse";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':motpasse', $motpasse);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $_SESSION['loggedin'] = true;
            header("Location: dashboardGest.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Email ou mot de passe incorrect";
            header("Location: loginGest.php");
            exit();
        }
    } catch(PDOException $e) {
        $_SESSION['login_error'] = "Une erreur est survenue";
        header("Location: loginGest.php");
        exit();
    }
} else {
    $_SESSION['login_error'] = "Veuillez remplir tous les champs";
    header("Location: loginGest.php");
    exit();
}
?>