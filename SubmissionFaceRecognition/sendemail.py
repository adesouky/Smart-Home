import smtplib
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders
from email.mime.multipart import MIMEMultipart
 
def send(toaddr,filename,filepath):
	fromaddr = "smart.home.inc.2018@gmail.com" 
 
	msg = MIMEMultipart()
 
	msg['From'] = fromaddr
	msg['To'] = toaddr
	msg['Subject'] = "UNAUTHORISED INDIVIDUAL DETECTED"
 
	body = "An unauthorised person tried to access your home. Check attachment for a picture." 
 
	msg.attach(MIMEText(body, 'plain'))
 
	attachment = open(filepath, "rb")
 
	part = MIMEBase('application', 'octet-stream')
	part.set_payload((attachment).read())
	encoders.encode_base64(part)
	part.add_header('Content-Disposition', "attachment; filename= %s" % filename)
 
	msg.attach(part)
 
	server = smtplib.SMTP('smtp.gmail.com', 587)
	server.starttls()
	server.login(fromaddr, "G3123456")
	text = msg.as_string()
	server.sendmail(fromaddr, toaddr, text)
	server.quit()


