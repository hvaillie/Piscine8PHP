var ft_list;

window.onload = function () {
	document.querySelector("#new").addEventListener("click", newTodo);
	ft_list = document.querySelector("#ft_list");
};

function newTodo(){
    var todo = prompt("Créer une nouvelle tâche", 'une idée?');
    if (todo !== '') {
        addTodo(todo)
    }
};

function addTodo(todo){
    var div = document.createElement("div");
    div.innerHTML = todo;
    div.addEventListener("click", deleteTodo);
    ft_list.insertBefore(div, ft_list.firstChild);
};

function deleteTodo(){
	if (confirm("Supprimer cette tâche ?")){
		this.parentElement.removeChild(this);
	}
};
