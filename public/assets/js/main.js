let tasks = document.querySelectorAll('.task');
tasks.forEach(task => {
    task.addEventListener('click', () => {
        window.location = '/task?id=' + task.dataset.taskId;
    });
});