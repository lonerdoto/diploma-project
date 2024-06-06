import Chart from "chart.js/auto";


const ctxEmployees = document.getElementById('topEmployeesChart').getContext('2d');
const periodPreloader = document.getElementById('applicationsChart').parentNode.parentNode.children[2].children[0]
function createChartEmployee(data) {
    const labels = data.map(item => item.user_name);
    const counts = data.map(item => item.count);
    let chartEmployees = new Chart(ctxEmployees, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Кол-во заявок',
                data: counts,
                backgroundColor: 'rgba(30, 136, 229, 0.8)',
                borderColor: 'rgba(30, 136, 229, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#ffffff'
                    }
                },
                x: {
                    ticks: {
                        color: '#ffffff'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#ffffff'
                    }
                }
            }
        }
    });
}


const ctx = document.getElementById('applicationsChart').getContext('2d');
let chart;
function createChart(data) {
    const labels = data.map(item => item.date);
    const counts = data.map(item => item.count);

    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Кол-во заявок',
                data: counts,
                backgroundColor: 'rgba(30, 136, 229, 0.2)',
                borderColor: 'rgba(30, 136, 229, 1)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#ffffff'
                    }
                },
                x: {
                    ticks: {
                        color: '#ffffff'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#ffffff'
                    }
                }
            }
        }
    });
}

const biggerThanZero = (value) => {
    return value > 0 ? "+" + value : value
}

async function getCalculatedAnalyticsData() {
    await fetch(`/api/calculated-analytics-data`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Ошибка, неудачный запрос');
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('applications-count').innerText = data.applicationsCount
            document.getElementById('applications-today-count').innerText = biggerThanZero(data.applicationsTodayCount)


            document.getElementById('users-count').innerText = data.usersCount
            document.getElementById('users-today-count').innerText = biggerThanZero(data.usersTodayCount)


            document.getElementById('accepted-applications-count').innerText = data.acceptedApplicationsCount
            document.getElementById('accepted-applications-today-count').innerText = biggerThanZero(data.acceptedApplicationsTodayCount)


            document.getElementById('new-applications-count').innerText = data.newApplicationsCount
            document.getElementById('new-applications-today-count').innerText = biggerThanZero(data.newApplicationsTodayCount)

        })
        .catch(error => console.error('Error:', error));
}

getCalculatedAnalyticsData()

async function updateChart(period) {
    await fetch(`api/applications/${period}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Ошибка, неудачный запрос');
            }
            return response.json();
        })
        .then(data => {
            if (chart) {
                chart.destroy();
            }
            createChart(data);
            if(typeof periodPreloader !== "undefined") {
                periodPreloader.remove()
            }
        })
        .catch(error => console.error('Error:', error));

    await fetch('/api/top-employees')
        .then(response => response.json())
        .then(data => {
            createChartEmployee(data);
            document.getElementById('topEmployeesChart').parentNode.parentNode.children[1].children[0].remove()
        })
        .catch(error => console.error('Error:', error));
}


updateChart('week')
document.querySelectorAll('#select-period-chart').forEach(e => {
    e.addEventListener('click', j => {
        updateChart(e.getAttribute('data-filter-by'))
    })
})
