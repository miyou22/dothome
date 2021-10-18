function init() {
  let mMenu = document.querySelector("#header .m_menu");
  let mMenuList = document.querySelector("#header .m_menuList");

  mMenu.addEventListener("click", () => {
    mMenuList.classList.toggle("show")
  });
}

//시험후기,공지사항 검색버튼 빈칸 확인
function searchBtnCheck(){
  const searchKeyword = document.querySelector("#searchKeyword").value;

  if(searchKeyword == null || searchKeyword == ''){
    alert("검색어를 입력해주세요!");
    return false;
  }
}



init();