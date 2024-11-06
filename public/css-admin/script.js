const comments = [  
    {  
        name: "علی رضایی",  
        company: "شرکت ABC",  
        email: "ali@example.com",  
        phone: "09123456789",  
        text: "این یک نظر نمونه است.",  
        date: "1402/08/10"  
    },  
    {  
        name: "مریم امیری",  
        company: "شرکت XYZ",  
        email: "maryam@example.com",  
        phone: "09198765432",  
        text: "نظر بسیار مفیدی بود.",  
        date: "1402/08/11"  
    }  
];  

function loadComments(comments) {  
    const tableBody = document.getElementById('comments-table');  
    comments.forEach(comment => {  
        const row = document.createElement('tr');  
        row.innerHTML = `  
            <td>${comment.name}</td>  
            <td>${comment.company}</td>  
            <td>${comment.email}</td>  
            <td>${comment.phone}</td>  
            <td>${comment.text}</td>  
            <td>${comment.date}</td>  
        `;  
        tableBody.appendChild(row);  
    });  
}  

document.addEventListener("DOMContentLoaded", function() {  
    loadComments(comments);  
});