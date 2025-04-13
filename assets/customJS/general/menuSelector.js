document.addEventListener("DOMContentLoaded", function () {
  const currentUrl = window.location.origin + window.location.pathname;

  document.querySelectorAll(".nav-sidebar a").forEach(function (link) {
      const linkUrl = link.href;

      if (currentUrl === linkUrl || currentUrl.startsWith(linkUrl)) {
          link.classList.add("active");

          const navItem = link.closest(".nav-item.has-treeview");
          if (navItem) {
              navItem.classList.add("menu-open");
              const parentLink = navItem.querySelector("a.nav-link");
              if (parentLink) {
                  parentLink.classList.add("active");
              }
          }
      }
  });
});