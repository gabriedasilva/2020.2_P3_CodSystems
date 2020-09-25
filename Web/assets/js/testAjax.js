let xhr = new XMLHttpRequest();

xhr.open('GET', 'http://localhost/2020.2_P3_CodSystems/Web/App/Controllers/Professores');

xhr.onreadystatechange = () => {
    if(xhr.readyState == 4) {
        if(xhr.status == 200) {
            console.log(JSON.parse(xhr.responseText));
        }
    }
};

xhr.send();