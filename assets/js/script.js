/**
 * Created by HP Pavilion 17 on 20.3.2017 г..
 */
function deleteElement(id){
    if(confirm('Абе, сигурен ли си, че искаш да го махнеш от списъка си?')){
        var mediator = new XMLHttpRequest();
        mediator.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200){
                document.getElementById(id).innerHTML = '';
            }
        };
        mediator.open('POST', 'http://localhost/PHP2/Project-short/remove.php?id=' + id, true);
        mediator.send(null);
        alert("Браво! И без това не ти трябваше тоя. ;)");
    }
}
