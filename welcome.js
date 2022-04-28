document.title = document.querySelector("#welcome").textContent;

myBooklist = document.querySelector(".booklist");
AvailableBookList = document.querySelector(".getBook");
function showMyBooks(){
    if(myBooklist.classList.contains('active')){
        myBooklist.classList.remove("active");
    }else{
        document.title = "My Books";
        myBooklist.classList.add("active");
    }
}

function showAvailableBooks(){
    // check();
    if(AvailableBookList.classList.contains("active")){
        AvailableBookList.classList.remove("active");
    }else{
        document.title = "Get Books";
        AvailableBookList.classList.add("active");
    }
}

// function check(){
//     if(myBooklist.classList.contains("active")){
//         myBooklist.classList.remove("active");
//     }else{
//         AvailableBookList.classList("active");
//     }
// }