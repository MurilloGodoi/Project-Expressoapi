@component('mail::panel')
    MAGIT IT - Recuperação de senha
@endcomponent


@component('mail::message')
    Olá {{$name}} !!<br>
    Sua nova senha é: {{$password}}<br>
    Você já pode realizar login com essa nova senha<br>
    Qualquer dúvida, pode entrar em contato com nosso suporte pelo email: magitit@suporte.com
@endcomponent

