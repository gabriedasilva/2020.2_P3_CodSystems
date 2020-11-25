import axios from 'axios';

  //ARQUIVO DE CONFIGURAÇÃO DO AXIOS

    const api = axios.create({
    baseURL:'http://iclassweb.life',
    headers:{'X-Requested-With': 'XMLHttpRequest'},

})


export default api; 

