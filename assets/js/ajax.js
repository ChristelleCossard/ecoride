

function Showusers(){
    const xhr = new XMLHttpRequest();
xhr.open('GET', 'https://reqres.in/api/users?page=1');

xhr.addEventListener('readystatechange', function() {
    if(xhr.readyState === 4){
         if(xhr.status === 200) {
        console.log("Response = " + xhr.response);
       const object = JSON.parse(xhr.response);
       
       let myhtml = "";
       object.data.forEach(element => {
            myhtml += '<div><p>'+element.first_name+' '+element.last_name+'</p></div>'
       }); 
       document.getElementById("allutilisateurs").innerHTML = myhtml;
         }
         else if(xhr.status == 404){
            alert("Impossible de trouver l'URL de la requête ajax");
         }
        else{
            alert("Une erreur est survenue");
        }
    };
});

xhr.send();
}

