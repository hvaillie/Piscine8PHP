var ft_list;

window.onload = function () {
	$("#new").click(newTodo);
	ft_list = $("#ft_list");
	$('#ft_list div').click(deleteTodo); // pour les futurs elements div créés
};

function newTodo(){
    var todo = prompt("Créer une nouvelle tâche", 'une idée?');
    if (todo !== '') {
        addTodo(todo)
    }
};

function addTodo(todo){
	ft_list.prepend($('<div>' + todo + '</div>').click(deleteTodo));
};

function deleteTodo(){
	if (confirm("Supprimer cette tâche ?")){
		this.remove();
	}
};
