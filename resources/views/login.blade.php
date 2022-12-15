
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Form Wave Animation</title>
   <link rel="stylesheet" href="{{asset('css/css.css')}}">
</head>
<body>
    <div class="container">
        <h1>Please login</h1>
        <form >
            <div class="form-control">
                <input type="text" required>
                <label >Email</label>
            </div>
            <div class="form-control">
                <input type="password" required>
                <label >password</label><br>

                <button class="btn">Login </button>

                <p class="text">
                    Don't have an account <a href="">Register</a>
                </p>

             </div>
        </form>
    </div>


   <script src="javascript.js"></script>
</body>
</html>
<script>
const labels = document.querySelectorAll('.form-control label');


labels.forEach(label =>{
    label.innerHTML = label.innerText
    .split('')
    .map((letter,idx) => `<span style="transition-delay:${idx * 65}ms">${letter}</span>`)
    .join('')
})
</script>
