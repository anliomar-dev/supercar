<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/supercar/assets/css/styles.css">
    <script src="/supercar/assets/js/contact.js" type="module" defer></script>
    <title>connexion</title>
</head>
<body class="">
<div class="bg-base-200 fixed top-0 start-0 h-2/3 w-full z-[-1]"></div>
<?php if(isset($message)): ?>
    <div class="fixed top-24 flex justify-center w-full px-6">
        <div role="alert" class="alert alert-success w-full md:w-1/2 lg:w-2/5 flex flex-col md:flex-row justify-between">
            <div class="flex flex-col items-center md:flex-row gap-4">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 shrink-0 stroke-current text-white"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-white">Votre message a été envoyé ! Nous vous contacterons bientôt</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     class="size-6 font-bold hover:cursor-pointer remove-alert-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
    </div>
<?php endif; ?>
<h1 class="text-2xl md:text-4xl lg:text-5xl text-primary text-center font-comic py-8">Contactez nous</h1>
<div class="w-full flex flex-col gap-y-6 items-center py-6 px-6 md:px-0">
    <div class="w-full md:w-auto flex flex-col gap-4 bg-base-100 border rounded-lg shadow-lg p-2 md:p-6">
        <!-- contact form -->
        <div class="contact-form">
            <form action="/supercar/contact" method="POST" class="w-auto flex flex-col gap-y-2">
                <button class="btn btn-primary min-h-0 h-10">login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
