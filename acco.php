<!DOCTYPE html>
<html>
<head>
    <style>
 
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #212428;
    display: flex;
    justify-content: center;
}

section {
    width: 60%;
    margin-top: 100px;
}

.accordion {
    border-radius: 15px;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    -ms-border-radius: 15px;
    -o-border-radius: 15px;
    background: linear-gradient(145deg, #1e2024, #23272b);
    box-shadow: 10px 10px 19px #1c1e22, -10px -10px 19px #262a2e;
    position: relative;
    margin: 30px 0;
}

.accordion h3 {
    font-size: 1.1rem;
    color: #c4cfde;
    font-family: 'Poppins', sans-serif;
    padding: 20px;
    cursor: pointer;
}

.accordion::after {
    content: '';
    display: block;
    position: absolute;
    right: 20px;
    top: 20px;
    width: 11px;
    height: 11px;
    border-radius: 100%;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    -ms-border-radius: 100%;
    -o-border-radius: 100%;
    background-color: #1c1e22;
    box-shadow: 10px 10px 19px #1c1e22, -10px -10px 19px #262a2e;
}

.accordion.active::after {
    background-color: #f9004d;
}

.accordion p {
    font-size: 1rem;
    color: #c4cfde;
    font-family: 'Poppins', sans-serif;
    opacity: .5;
    padding: 20px;
}

.answer {
    overflow: hidden;
    height: 0;
    transition: .5s;
    -webkit-transition: .5s;
    -moz-transition: .5s;
    -ms-transition: .5s;
    -o-transition: .5s;
}

    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<section>

<div class="accordion">
    <div class="question">
        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit sunt?</h3>
    </div>
    <div class="answer">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor necessitatibus voluptatibus quasi,
            perspiciatis similique beatae sint, assumenda vel magni corrupti asperiores esse eligendi possimus
            nesciunt veniam provident mollitia eveniet deserunt.
        </p>
    </div>
</div>

<div class="accordion">
    <div class="question">
        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit sunt?</h3>
    </div>
    <div class="answer">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor necessitatibus voluptatibus quasi,
            perspiciatis similique beatae sint, assumenda vel magni corrupti asperiores esse eligendi possimus
            nesciunt veniam provident mollitia eveniet deserunt.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor necessitatibus voluptatibus quasi,
            perspiciatis similique beatae sint, assumenda vel magni corrupti asperiores esse eligendi possimus
            nesciunt veniam provident mollitia eveniet deserunt.
        </p>
    </div>
</div>

<div class="accordion">
    <div class="question">
        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit sunt?</h3>
    </div>
    <div class="answer">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor necessitatibus voluptatibus quasi,
            perspiciatis similique beatae sint, assumenda vel magni corrupti asperiores esse eligendi possimus
            nesciunt veniam provident mollitia eveniet deserunt.
        </p>
    </div>
</div>

</section>
<script>

const accordion = document.querySelectorAll('.accordion h3');
let mainParent;
let height;
let answer;
accordion.forEach(item => {
    item.addEventListener('click', () => {
        height = item.parentElement.nextElementSibling.firstElementChild.offsetHeight;
        answer = item.parentElement.nextElementSibling;
        mainParent = item.parentElement.parentElement;
        if (mainParent.classList.contains('active')) {
            mainParent.classList.remove('active');
            answer.style.height = `0px`;
        } else { 
            mainParent.classList.add('active');
            answer.style.height = `${height}px`;
        }
    });
});

</script>
    <script src="script.js"></script>
</body>
</html>
