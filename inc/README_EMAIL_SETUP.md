# Email Setup Instructions

## Problem
PHP's `mail()` function often doesn't work on localhost or servers without proper mail server configuration.

## Solution Options

### Option 1: Use Gmail SMTP (Recommended)
1. Go to your Gmail account: https://myaccount.google.com/
2. Enable 2-Step Verification
3. Generate App Password: https://myaccount.google.com/apppasswords
4. Copy the 16-character app password
5. Update `inc/sendemail_smtp.php` with your app password
6. Change form action in `contact.php` to use `inc/sendemail_smtp.php`

### Option 2: Use PHP mail() on Production Server
Most production servers have mail() configured. The current `inc/sendemail.php` should work on production.

### Option 3: Use Email Service (SendGrid, Mailgun, etc.)
For production, consider using services like:
- SendGrid (Free tier: 100 emails/day)
- Mailgun (Free tier: 5,000 emails/month)
- Amazon SES

## Quick Fix for Testing
The current setup logs all submissions to `inc/contact_log.txt` as a fallback. Check that file if emails aren't working.

