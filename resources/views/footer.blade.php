<!-- Ajouter un identifiant à votre footer -->
<footer id="main-footer">
    <div class="eco-footer">
        <p>Your footer content here</p>
        <!-- Ajouter d'autres éléments du footer si nécessaire -->
    </div>
</footer>

<!-- Ajouter le script JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.onscroll = function() {
            showHideFooter();
        };
    });

    function showHideFooter() {
        var footer = document.getElementById("main-footer");
        var scrollHeight = document.documentElement.scrollHeight;
        var clientHeight = document.documentElement.clientHeight;
        var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;

        // Afficher le footer uniquement lorsque l'utilisateur a fait défiler jusqu'en bas
        if (scrollTop + clientHeight >= scrollHeight) {
            footer.style.display = "block";
        } else {
            footer.style.display = "none";
        }
    }
</script>

