window.addEventListener("load", () => {
  document.querySelectorAll(".bouton_anim").forEach((btn) => {
    btn.addEventListener("click", function () {
      // Ajoute la classe d'animation
      console.log("Button clicked:", this);
      this.classList.add("clicked-anim");
      // Retire la classe après l'animation (par exemple 500ms)
      setTimeout(() => {
        this.classList.remove("clicked-anim");
      }, 500);
    });
  });
});
