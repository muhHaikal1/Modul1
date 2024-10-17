const inputField = document.getElementById("todo-input");
const addButton = document.getElementById("add-btn");
const todoList = document.getElementById("todo-list");

function addTodo() {
  const todoText = inputField.value.trim();

  if (todoText === "") {
    alert("Please enter a task!");
    return;
  }

  const listItem = document.createElement("li");
  const textSpan = document.createElement("span");
  textSpan.textContent = todoText;
  listItem.appendChild(textSpan);

  const editButton = document.createElement("button");
  editButton.textContent = "Edit";
  editButton.classList.add("edit-btn");
  editButton.addEventListener("click", function () {
    const newTodoText = prompt("Edit your task:", todoText);
    if (newTodoText !== null && newTodoText.trim() !== "") {
      textSpan.textContent = newTodoText;
    }
  });
  listItem.appendChild(editButton);

  const deleteButton = document.createElement("button");
  deleteButton.textContent = "Delete";
  deleteButton.classList.add("delete-btn");
  deleteButton.addEventListener("click", function () {
    listItem.remove();
  });
  listItem.appendChild(deleteButton);

  todoList.appendChild(listItem);

  inputField.value = "";
}

addButton.addEventListener("click", addTodo);

inputField.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    addTodo();
  }
});