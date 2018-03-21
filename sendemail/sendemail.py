import smtplib
from email.MIMEMultipart import MIMEMultipart
from email.MIMEText import MIMEText
from email.MIMEBase import MIMEBase
from email import encoders
 
def(toaddr,filename,filepath):

	fromaddr = " " //make new email
 
	msg = MIMEMultipart()
 
	msg['From'] = fromaddr
	msg['To'] = toaddr
	msg['Subject'] = "UNAUTHORISED INDIVIDUAL DETECTED"
 
	body = "An unauthorised person tried to access your home. Check attachment for a picture." //can change after testing
 
	msg.attach(MIMEText(body, 'plain'))
 
	attachment = open(filepath, "rb")
 
	part = MIMEBase('application', 'octet-stream')
	part.set_payload((attachment).read())
	encoders.encode_base64(part)
	part.add_header('Content-Disposition', "attachment; filename= %s" % filename)
 
	msg.attach(part)
 
	server = smtplib.SMTP('smtp.gmail.com', 587)
	server.starttls()
	server.login(fromaddr, "PASSWORD")
	text = msg.as_string()
	server.sendmail(fromaddr, toaddr, text)
	server.quit()
