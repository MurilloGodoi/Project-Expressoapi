@component('mail::message')
    #MAGIT IT - Recuperação de senha
    Olá {{$name}} !!
    Sua nova senha é: {{$password}}
    Você já pode realizar login com essa nova senha
    Qualquer dúvida, pode entrar em contato com nosso suporte pelo email: magitit@suporte.com
@endcomponent
