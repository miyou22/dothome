function init() {
  let mMenu = document.querySelector("#header .m_menu");
  let mMenuList = document.querySelector("#header .m_menuList");

  mMenu.addEventListener("click", () => {
    mMenuList.classList.toggle("show")
  });
}
init();