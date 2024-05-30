function info(id) {
    const info = document.getElementsByClassName("info")[id];
    
    if (info.style.display === 'none') {
        info.style.display = 'inline';
    } else {
        info.style.display = 'none';
    }
}

function filterTasks(input, tasklistId_in_db, tasklistId_in_js) {
    var filter = input.value.toLowerCase();
    var taskContainer = document.getElementById('task-container-' + tasklistId_in_db);
    var tasks = taskContainer.getElementsByClassName('task');
    var results = document.getElementsByClassName('results')[tasklistId_in_js];
    var anyVisible = false;

    for (var i = 0; i < tasks.length; i++) {
        var title = tasks[i].getElementsByClassName('task-title')[0];
        if (title.innerText.toLowerCase().indexOf(filter) > -1) {
            tasks[i].style.display = "";
            anyVisible = true;
        } else {
            tasks[i].style.display = "none";
        }
    }

    results.style.display = anyVisible ? "none" : "";
}

function filterTaskLists() {
    var input = document.querySelector('.search-bar-tasklists');
    var filter = input.value.toLowerCase();
    var tasklistContainer = document.getElementById('tasklist-container');
    var tasklists = tasklistContainer.getElementsByClassName('tasklist-item');
    var results = document.getElementById('results');
    var anyVisible = false;

    for (var i = 0; i < tasklists.length; i++) {
        var title = tasklists[i].getAttribute('data-title');
        if (title.indexOf(filter) > -1) {
            tasklists[i].style.display = "";
            anyVisible = true;
        } else {
            tasklists[i].style.display = "none";
        }
    }

    results.style.display = anyVisible ? "none" : "";
}

function filterTasksByTitleAndStatus(tasklistId) {
    var titleInput = document.getElementById('task-search-bar-' + tasklistId);
    var statusInput = document.getElementById('task-status-' + tasklistId);
    if (!titleInput || !statusInput) return;

    var titleFilter = titleInput.value.toLowerCase();
    var statusFilter = statusInput.value.toLowerCase();
    var taskContainer = document.getElementById('task-container-' + tasklistId);
    var tasks = taskContainer.getElementsByClassName('task');
    var anyVisible = false;

    for (var i = 0; i < tasks.length; i++) {
        var title = tasks[i].querySelector('.task-title h3').innerText.toLowerCase();
        var status = tasks[i].querySelector('.status').innerText.toLowerCase();
        if (title.includes(titleFilter) && (status.includes(statusFilter) || statusFilter === '')) {
            tasks[i].style.display = "";
            anyVisible = true;
        } else {
            tasks[i].style.display = "none";
        }
    }

    var results = document.getElementById('results');
    results.style.display = anyVisible ? "none" : "";
}

function filterAssignments() {
    var input = document.querySelector('.search-bar-tasklists');
    var filter = input.value.toLowerCase();
    var assignedTasklistContainer = document.getElementById('assigned-tasklist-container');
    var assignedTasklists = assignedTasklistContainer.getElementsByClassName('tasklist-item');
    var results = document.getElementById('results');
    var anyVisible = false;

    for (var i = 0; i < assignedTasklists.length; i++) {
        var title = assignedTasklists[i].getAttribute('data-title');
        if (title.indexOf(filter) > -1) {
            assignedTasklists[i].style.display = "";
            anyVisible = true;
        } else {
            assignedTasklists[i].style.display = "none";
        }
    }

    results.style.display = anyVisible ? "none" : "";
}
