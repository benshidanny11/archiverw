<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="d-flex col-5">
        <a class="navbar-brand" href="index.php"><img src="./assets/img/archivelogo.png" alt="" width="160"> Archive
          Rwanda</a>

      </div>
      <ul class="navbar-nav me-auto col-7 d-flex justify-content-between">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Ahabanza</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="books.php">Inyandiko</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inshingano.php">Inshingano</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="feedback.php">Dusigire igitekerezo</a>
        </li>
        <li class="nav-item dropdown" id="en-defalt">
        <a href="#" hreflang="rw-RW" class="nav-link language-nav-link" style="display: flex;">
                <span class="flag-icon flag-icon-rw"></span><span>Kinyarwanda</span>
              </a>

          <ul style="display: none;" id="other-languages" class="navbar-nav language-nav-bar">
            <li class="nav-item">
            <a href="lan/en/index.php" id="navbarDropdown" role="button" title="English" class="nav-link sf-with-ul">
            <span class="flag-icon flag-icon-gb">
            </span><span>English</span></a>
            </li>
            <li class="nav-item">
              <a href="lan/fr/index.php" hreflang="fr_FR" title="French" class="nav-link language-nav-link">
                <span class="flag-icon flag-icon-fr"></span>
                <span>French</span>
              </a>
            </li>
          </ul>

        </li>
      </ul>
    </div>
  </div>
</nav>


<script>
  const defaltItem = document.getElementById("en-defalt");
  defaltItem.addEventListener("mousemove", () => {
    const otherLanguages = document.getElementById("other-languages");
    otherLanguages.style.display = "block";
  })

  defaltItem.addEventListener("mouseleave", () => {
    const otherLanguages = document.getElementById("other-languages");
    otherLanguages.style.display = "none";
  })
</script>