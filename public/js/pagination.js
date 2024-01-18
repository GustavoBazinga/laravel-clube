let limit = 10;
let list;
let lastSearch = '';
const search = document.querySelector('#search');

search.addEventListener('keyup', () => {
    loadItem();
});


const loadItem = () => {
    list = [...document.querySelectorAll('.item')];
    const searchValue = search.value.toLowerCase();
    const begin = (thisPage - 1) * limit;
    const end = thisPage * limit - 1;
    if (searchValue == '') {
        list.forEach((item, index) => {
            item.classList.remove('matched', 'unmatched');
            item.classList.add(index >= begin && index <= end ? 'matched' : 'unmatched')
        })
    }
    else {
        list.forEach((item, index) => {
            item.classList.remove('matched');
            item.classList.add('unmatched')
        });
        list = list.filter(item => item.innerHTML.toLowerCase().includes(searchValue));
        list.forEach((item, index) => {
            item.classList.remove('matched');
            item.classList.remove('unmatched');
            item.classList.add(index >= begin && index <= end ? 'matched' : 'unmatched')
        })
        if (lastSearch !== searchValue) {
            thisPage = 1;
            lastSearch = searchValue;
        }
    }
    updatePagination();
};

const updatePagination = () => {
    const count = Math.ceil(list.length / limit);
    const pagination = document.querySelector('.pagination');
    pagination.innerHTML = '';

    if (thisPage !== 1) {
        const liFirst = createPageLink("Primeiro", 1);
        pagination.appendChild(liFirst);
        const li = createPageLink('Anterior', thisPage - 1);
        pagination.appendChild(li);
    }

    let start = 1;
    let end = count;
    if (count > 5) {
        start = thisPage > 2 ? thisPage - 2 : start;
        end = thisPage < count - 2 ? thisPage + 2 : end;
    }

    for (let i = start; i <= end; i++) {
        const li = createPageLink(i, i);
        i === thisPage ? li.classList.add('active') : null;
        pagination.appendChild(li);
    }

    if (thisPage !== count) {
        const li = createPageLink('Próximo', thisPage + 1);
        pagination.appendChild(li);
        const liLast = createPageLink("Último", count);
        pagination.appendChild(liLast);
    }
};

const createPageLink = (text, page) => {
    const li = document.createElement('li');
    li.innerHTML = `<a href="#" class="page-link">${text}</a>`;
    li.classList.add('page-item');
    li.addEventListener('click', () => {
        thisPage = page;
        loadItem();
    });
    return li;
};



let thisPage = 1;
loadItem();