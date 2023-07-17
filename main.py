from email.message import EmailMessage
import smtplib
import sys

destinatario = sys.argv[1]


remitente = "secureu.course@gmail.com"
mensaje = "¡Enhorabuena por haber aprobado el curso de Phishing en SecureU!\n Inicia sesión para obtener tu certificado\n http://localhost/project/login2.php"

email = EmailMessage()
email["From"] = remitente
email["To"] = destinatario
email["Subject"] = "Certificado SecureU"
email.set_content(mensaje)

smtp = smtplib.SMTP_SSL("smtp.gmail.com")
smtp.login(remitente, "cqbhocxfuklwbpyi")
smtp.sendmail(remitente, destinatario, email.as_string())

smtp.quit()