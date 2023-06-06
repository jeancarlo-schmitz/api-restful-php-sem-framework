<?php

namespace utils;

class Sanitizer
{
    public function sanitizeAll($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->sanitizeValue($value);
            }
        }else{
            $data = $this->sanitize($data);
        }

        return $data;
    }

    private function sanitizeValue($value)
    {
        if (is_array($value)) {
            foreach ($value as $subKey => $subValue) {
                $value[$subKey] = $this->sanitizeValue($subValue);
            }
        } else {
            $value = $this->sanitize($value);
        }

        return $value;
    }

    private function sanitize($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        $value = EncodingConverter::convertNestedArrayToIso88591($value);

        return $value;
    }

}