<?php

namespace App\Http;

class SendPasswordToEmail 
{
    public static function SendPasswordToEmailTeacher(string $to, string $password)
    {        
        $subject = 'BTR Education Teacher Registration';
        $message = 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/teacherLogin';
        $headers = 'From: noreply@education.bodoland.gov.in'       . "\r\n" .
                    'Reply-To: noreply@education.bodoland.gov.in' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }

    public static function SendPasswordToEmailHeadTeacher(string $to, string $password)
    {
        $subject = 'BTR Education Head Teacher Registration';
        $message = 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/headTeacherLogin';
        $headers = 'From: noreply@education.bodoland.gov.in'       . "\r\n" .
                    'Reply-To: noreply@education.bodoland.gov.in' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }

    public static function SendPasswordToEmailOfficer(string $to, string $officerType, string $password)
    {
        $subject = '';
        $message = '';


        if($officerType == 'IS'){

            $subject .= 'BTR Education IS Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } else if($officerType == 'DPC'){

            $subject .= 'BTR Education DPC Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } else if($officerType == 'DMC'){

            $subject .= 'BTR Education DMC Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } else if($officerType == 'DEEO'){

            $subject .= 'BTR Education DEEO Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } else if($officerType == 'DI'){

            $subject .= 'BTR Education DI Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } else if($officerType == 'BEEO'){

            $subject .= 'BTR Education BEEO Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } else if($officerType == 'BMC'){

            $subject .= 'BTR Education BMC Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } else if($officerType == 'DEO'){

            $subject .= 'BTR Education DEO Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } else if($officerType == 'Approver'){

            $subject .= 'BTR Education Approver Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } else if($officerType == 'Manager'){

            $subject .= 'BTR Education Manager Registration';
            $message .= 'Your profile has been created.    Login UserName : ' . $to . '   Password : ' . $password . '     Login URL : https://education.bodoland.gov.in/Dashboard/public/officer/login';

        } 

        $headers = 'From: noreply@education.bodoland.gov.in'       . "\r\n" .
                    'Reply-To: noreply@education.bodoland.gov.in' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
    
}

