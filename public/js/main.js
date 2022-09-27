// alert("hello")
function displayBlock(ele){
    ele.classList.remove('d-none');
    ele.classList.add('d-block');
}

function displayNone(ele){
    ele.classList.remove('d-block');
    ele.classList.add('d-none');
}

function displayCommentInput(post_id){
    displayNone(document.getElementById(`addComment_${post_id}`))
    let commentInput = document.getElementById(`commentInput_${post_id}`);
    console.log(document.getElementById(`addComment_${post_id}`));
    console.log(commentInput);

    displayBlock(commentInput);
}

function confirmPop(){
    let yerOrNo = window.confirm('Are you sure?');

    return yerOrNo ? true : false;
}

function categoryColor(id){
    const categoryGroup = document.getElementById('categoryGroup');
    let categoryItems = categoryGroup.querySelectorAll('list-group-item');

    categoryItems.item(id).classList.add('bg-primary')
}
