let $toggle = document.createElement("button");
$toggle.type = "button";
$toggle.classList.add("theme-toggle");
$toggle.innerText = "Theme Toggle";
$toggle.setAttribute("aria-label", "Toggle dark mode");
$toggle.setAttribute("aria-pressed", "false");
document.body.appendChild($toggle);

$toggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-theme");
  const isDark = document.body.classList.contains("dark-theme");
  $toggle.setAttribute("aria-pressed", isDark ? "true" : "false");
});
