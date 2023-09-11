const limit = 10;
const list = [...document.querySelectorAll('.list .item')];

const loadItem = () => {
    const begin = (thisPage - 1) * limit;
    const end = thisPage * limit - 1;
    list.forEach((item, index) => {
        item.style.display = index >= begin && index <= end ? 'block' : 'none';
    });
    updatePagination();
};

const updatePagination = () => {
    const count = Math.ceil(list.length / limit);
    const pagination = document.querySelector('.pagination');
    pagination.innerHTML = '';

    if (thisPage !== 1) {
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