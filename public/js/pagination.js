let thisPage = 1;
let limit = 10;
let list = document.querySelectorAll('.list .item');


function loadItem(){
    let begin = (thisPage - 1) * limit;
    let end = thisPage * limit - 1;
    list.forEach((item, index) => {
        if(index >= begin && index <= end){
            console.log("Hide");
            item.style.display = 'block';
        }else{
            console.log("Show");
            item.style.display = 'none';
        }
        console.log(index);
    });
    listPage();
}

loadItem();

function listPage(){
    let count = Math.ceil(list.length / limit);
    document.querySelector('.pagination').innerHTML = '';

    if(thisPage !== 1){
        let li = document.createElement('li');
        li.innerHTML = `<a href="#" class="page-link">Anterior</a>`;
        li.classList.add('page-item')
        li.addEventListener('click', () => {
            thisPage--;
            loadItem();
        });
        document.querySelector('.pagination').appendChild(li);
    }

    for(let i = 1; i <= count; i++){
        let li = document.createElement('li');
        li.innerHTML = `<a href="#" class="page-link">${i}</a>`;
        if(i === thisPage){
            li.classList.add('active');
        }
        li.classList.add('page-item')
        li.addEventListener('click', () => {
            thisPage = i;
            loadItem();
        });
        document.querySelector('.pagination').appendChild(li);
    }

    if(thisPage !== count){
        let li = document.createElement('li');
        li.innerHTML = `<a href="#" class="page-link">Próximo</a>`;
        li.classList.add('page-item')
        li.addEventListener('click', () => {
            thisPage++;
            loadItem();
        });
        document.querySelector('.pagination').appendChild(li);
    }
}
