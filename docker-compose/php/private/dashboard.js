
function info(id){
    const info = document.getElementsByClassName("info")[id]
    const info_button = document.getElementsByClassName("info_button")[id]
    console.log(id);
    if(info.style.display == 'none' ){
        info.style.display = 'inline';
        info_button.innerHTML = 'hide info';
    }else{
        info.style.display = 'none';
        info_button.innerHTML = 'show info';
    }
}


function filterTasks(input, tasklistId) {
    var filter = input.value.toLowerCase();
    var taskContainer = document.getElementById('task-container-' + tasklistId);
    var tasks = taskContainer.getElementsByClassName('task');
    
    for (var i = 0; i < tasks.length; i++) {
        var title = tasks[i].getElementsByClassName('title')[0];
        if (title.innerText.toLowerCase().indexOf(filter) > -1) {
            tasks[i].style.display = "";
        } else {
            tasks[i].style.display = "none";
            
        }
    }
}


function filterTaskLists() {
            var input = document.querySelector('.search-bar-tasklists');
            var filter = input.value.toLowerCase();
            var tasklistContainer = document.getElementById('tasklist-container');
            var tasklists = tasklistContainer.getElementsByClassName('tasklist-item');
            
            for (var i = 0; i < tasklists.length; i++) {
                var title = tasklists[i].getAttribute('data-title');
                if (title.indexOf(filter) > -1) {
                    tasklists[i].style.display = "";
                } else {
                    tasklists[i].style.display = "none";
                }
            }

            var assignedTasklistContainer = document.getElementById('assigned-tasklist-container');
            var assignedTasklists = assignedTasklistContainer.getElementsByClassName('tasklist-item');
            
            for (var i = 0; i < assignedTasklists.length; i++) {
                var title = assignedTasklists[i].getAttribute('data-title');
                if (title.indexOf(filter) > -1) {
                    assignedTasklists[i].style.display = "";
                } else {
                    assignedTasklists[i].style.display = "none";
                }
            }
        }
