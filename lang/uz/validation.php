<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Quyidagi til qatorlari validator tomonidan ishlatiladigan standart xatolik
    | xabarlaridir. Ba’zi qoidalar (masalan size) bir nechta ko‘rinishga ega.
    | Siz ularni loyihangizga moslab o‘zgartirishingiz mumkin.
    |
    */

    'accepted' => ':attribute maydoni qabul qilinishi kerak.',
    'accepted_if' => ':other :value bo‘lganda :attribute maydoni qabul qilinishi kerak.',
    'active_url' => ':attribute maydoni to‘g‘ri URL bo‘lishi kerak.',
    'after' => ':attribute maydoni :date sanasidan keyin bo‘lishi kerak.',
    'after_or_equal' => ':attribute maydoni :date sanasidan keyin yoki teng bo‘lishi kerak.',
    'alpha' => ':attribute maydoni faqat harflardan iborat bo‘lishi kerak.',
    'alpha_dash' => ':attribute maydoni faqat harflar, raqamlar, chiziqcha va pastki chiziqdan iborat bo‘lishi kerak.',
    'alpha_num' => ':attribute maydoni faqat harflar va raqamlardan iborat bo‘lishi kerak.',
    'any_of' => ':attribute maydoni noto‘g‘ri.',
    'array' => ':attribute maydoni massiv (array) bo‘lishi kerak.',
    'ascii' => ':attribute maydoni faqat ASCII belgilaridan iborat bo‘lishi kerak.',
    'before' => ':attribute maydoni :date sanasidan oldin bo‘lishi kerak.',
    'before_or_equal' => ':attribute maydoni :date sanasidan oldin yoki teng bo‘lishi kerak.',
    'between' => [
        'array' => ':attribute maydoni :min va :max ta element orasida bo‘lishi kerak.',
        'file' => ':attribute maydoni :min va :max kilobayt orasida bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :min va :max orasida bo‘lishi kerak.',
        'string' => ':attribute maydoni :min va :max ta belgi orasida bo‘lishi kerak.',
    ],
    'boolean' => ':attribute maydoni true yoki false bo‘lishi kerak.',
    'can' => ':attribute maydonida ruxsat berilmagan qiymat bor.',
    'confirmed' => ':attribute tasdiqlash mos kelmadi.',
    'contains' => ':attribute maydonida talab qilinadigan qiymat yo‘q.',
    'current_password' => 'Parol noto‘g‘ri.',
    'date' => ':attribute maydoni to‘g‘ri sana bo‘lishi kerak.',
    'date_equals' => ':attribute maydoni :date sanasiga teng bo‘lishi kerak.',
    'date_format' => ':attribute maydoni :format formatiga mos bo‘lishi kerak.',
    'decimal' => ':attribute maydoni :decimal ta kasr xonasiga ega bo‘lishi kerak.',
    'declined' => ':attribute maydoni rad etilishi kerak.',
    'declined_if' => ':other :value bo‘lganda :attribute maydoni rad etilishi kerak.',
    'different' => ':attribute va :other maydonlari bir xil bo‘lmasligi kerak.',
    'digits' => ':attribute maydoni :digits ta raqamdan iborat bo‘lishi kerak.',
    'digits_between' => ':attribute maydoni :min va :max ta raqam orasida bo‘lishi kerak.',
    'dimensions' => ':attribute rasmi o‘lchamlari noto‘g‘ri.',
    'distinct' => ':attribute maydonida takrorlangan qiymat bor.',
    'doesnt_contain' => ':attribute maydonida quyidagilar bo‘lmasligi kerak: :values.',
    'doesnt_end_with' => ':attribute maydoni quyidagilardan biri bilan tugamasligi kerak: :values.',
    'doesnt_start_with' => ':attribute maydoni quyidagilardan biri bilan boshlanmasligi kerak: :values.',
    'email' => ':attribute maydoni to‘g‘ri telefon raqam bo‘lishi kerak.',
    'encoding' => ':attribute maydoni :encoding formatida kodlangan bo‘lishi kerak.',
    'ends_with' => ':attribute maydoni quyidagilardan biri bilan tugashi kerak: :values.',
    'enum' => 'Tanlangan :attribute noto‘g‘ri.',
    'exists' => 'Tanlangan :attribute noto‘g‘ri.',
    'extensions' => ':attribute fayli quyidagi kengaytmalardan biri bo‘lishi kerak: :values.',
    'file' => ':attribute maydoni fayl bo‘lishi kerak.',
    'filled' => ':attribute maydoni to‘ldirilishi kerak.',
    'gt' => [
        'array' => ':attribute maydoni :value tadan ko‘p elementga ega bo‘lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan katta bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan katta bo‘lishi kerak.',
        'string' => ':attribute maydoni :value ta belgidan uzun bo‘lishi kerak.',
    ],
    'gte' => [
        'array' => ':attribute maydoni :value ta element yoki undan ko‘p bo‘lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan katta yoki teng bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan katta yoki teng bo‘lishi kerak.',
        'string' => ':attribute maydoni :value ta belgidan uzun yoki teng bo‘lishi kerak.',
    ],
    'hex_color' => ':attribute maydoni to‘g‘ri hex rang bo‘lishi kerak.',
    'image' => ':attribute maydoni rasm bo‘lishi kerak.',
    'in' => 'Tanlangan :attribute noto‘g‘ri.',
    'in_array' => ':attribute maydoni :other ichida mavjud bo‘lishi kerak.',
    'in_array_keys' => ':attribute maydonida quyidagi kalitlardan kamida bittasi bo‘lishi kerak: :values.',
    'integer' => ':attribute maydoni butun son bo‘lishi kerak.',
    'ip' => ':attribute maydoni to‘g‘ri IP manzil bo‘lishi kerak.',
    'ipv4' => ':attribute maydoni to‘g‘ri IPv4 manzil bo‘lishi kerak.',
    'ipv6' => ':attribute maydoni to‘g‘ri IPv6 manzil bo‘lishi kerak.',
    'json' => ':attribute maydoni to‘g‘ri JSON bo‘lishi kerak.',
    'list' => ':attribute maydoni ro‘yxat (list) bo‘lishi kerak.',
    'lowercase' => ':attribute maydoni kichik harflarda bo‘lishi kerak.',
    'lt' => [
        'array' => ':attribute maydoni :value tadan kam elementga ega bo‘lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan kichik bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan kichik bo‘lishi kerak.',
        'string' => ':attribute maydoni :value ta belgidan qisqa bo‘lishi kerak.',
    ],
    'lte' => [
        'array' => ':attribute maydoni :value tadan ko‘p bo‘lmagan elementga ega bo‘lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan kichik yoki teng bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan kichik yoki teng bo‘lishi kerak.',
        'string' => ':attribute maydoni :value ta belgidan qisqa yoki teng bo‘lishi kerak.',
    ],
    'mac_address' => ':attribute maydoni to‘g‘ri MAC manzil bo‘lishi kerak.',
    'max' => [
        'array' => ':attribute maydoni :max tadan ko‘p elementga ega bo‘lmasligi kerak.',
        'file' => ':attribute maydoni :max kilobaytdan katta bo‘lmasligi kerak.',
        'numeric' => ':attribute maydoni :max dan katta bo‘lmasligi kerak.',
        'string' => ':attribute maydoni :max ta belgidan uzun bo‘lmasligi kerak.',
    ],
    'max_digits' => ':attribute maydoni :max tadan ko‘p raqamga ega bo‘lmasligi kerak.',
    'mimes' => ':attribute fayli quyidagi turdagi bo‘lishi kerak: :values.',
    'mimetypes' => ':attribute fayli quyidagi turdagi bo‘lishi kerak: :values.',
    'min' => [
        'array' => ':attribute maydoni kamida :min ta elementga ega bo‘lishi kerak.',
        'file' => ':attribute maydoni kamida :min kilobayt bo‘lishi kerak.',
        'numeric' => ':attribute maydoni kamida :min bo‘lishi kerak.',
        'string' => ':attribute maydoni kamida :min ta belgidan iborat bo‘lishi kerak.',
    ],
    'min_digits' => ':attribute maydoni kamida :min ta raqamga ega bo‘lishi kerak.',
    'missing' => ':attribute maydoni bo‘lmasligi kerak.',
    'missing_if' => ':other :value bo‘lganda :attribute maydoni bo‘lmasligi kerak.',
    'missing_unless' => ':other :value bo‘lmasa :attribute maydoni bo‘lmasligi kerak.',
    'missing_with' => ':values mavjud bo‘lsa :attribute maydoni bo‘lmasligi kerak.',
    'missing_with_all' => ':values mavjud bo‘lsa :attribute maydoni bo‘lmasligi kerak.',
    'multiple_of' => ':attribute maydoni :value ga karrali bo‘lishi kerak.',
    'not_in' => 'Tanlangan :attribute noto‘g‘ri.',
    'not_regex' => ':attribute formati noto‘g‘ri.',
    'numeric' => ':attribute maydoni son bo‘lishi kerak.',
    'password' => [
        'letters' => ':attribute maydoni kamida bitta harfni o‘z ichiga olishi kerak.',
        'mixed' => ':attribute maydoni kamida bitta katta va bitta kichik harfni o‘z ichiga olishi kerak.',
        'numbers' => ':attribute maydoni kamida bitta raqamni o‘z ichiga olishi kerak.',
        'symbols' => ':attribute maydoni kamida bitta belgini o‘z ichiga olishi kerak.',
        'uncompromised' => 'Kiritilgan :attribute ma’lumotlar sizib chiqishida uchragan. Boshqa :attribute tanlang.',
    ],
    'present' => ':attribute maydoni mavjud bo‘lishi kerak.',
    'present_if' => ':other :value bo‘lganda :attribute maydoni mavjud bo‘lishi kerak.',
    'present_unless' => ':other :value bo‘lmasa :attribute maydoni mavjud bo‘lishi kerak.',
    'present_with' => ':values mavjud bo‘lsa :attribute maydoni mavjud bo‘lishi kerak.',
    'present_with_all' => ':values mavjud bo‘lsa :attribute maydoni mavjud bo‘lishi kerak.',
    'prohibited' => ':attribute maydoni taqiqlangan.',
    'prohibited_if' => ':other :value bo‘lganda :attribute maydoni taqiqlangan.',
    'prohibited_if_accepted' => ':other qabul qilingan bo‘lsa :attribute maydoni taqiqlangan.',
    'prohibited_if_declined' => ':other rad etilgan bo‘lsa :attribute maydoni taqiqlangan.',
    'prohibited_unless' => ':other :values ichida bo‘lmasa :attribute maydoni taqiqlangan.',
    'prohibits' => ':attribute maydoni :other maydonini kiritishni taqiqlaydi.',
    'regex' => ':attribute formati noto‘g‘ri.',
    'required' => ':attribute maydoni majburiy.',
    'required_array_keys' => ':attribute maydonida quyidagi kalitlar bo‘lishi kerak: :values.',
    'required_if' => ':other :value bo‘lganda :attribute maydoni majburiy.',
    'required_if_accepted' => ':other qabul qilingan bo‘lsa :attribute maydoni majburiy.',
    'required_if_declined' => ':other rad etilgan bo‘lsa :attribute maydoni majburiy.',
    'required_unless' => ':other :values ichida bo‘lmasa :attribute maydoni majburiy.',
    'required_with' => ':values mavjud bo‘lsa :attribute maydoni majburiy.',
    'required_with_all' => ':values mavjud bo‘lsa :attribute maydoni majburiy.',
    'required_without' => ':values mavjud bo‘lmasa :attribute maydoni majburiy.',
    'required_without_all' => ':values yo‘q bo‘lsa :attribute maydoni majburiy.',
    'same' => ':attribute maydoni :other bilan bir xil bo‘lishi kerak.',
    'size' => [
        'array' => ':attribute maydoni :size ta elementga ega bo‘lishi kerak.',
        'file' => ':attribute maydoni :size kilobayt bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :size bo‘lishi kerak.',
        'string' => ':attribute maydoni :size ta belgi bo‘lishi kerak.',
    ],
    'starts_with' => ':attribute maydoni quyidagilardan biri bilan boshlanishi kerak: :values.',
    'string' => ':attribute maydoni matn (string) bo‘lishi kerak.',
    'timezone' => ':attribute maydoni to‘g‘ri vaqt mintaqasi bo‘lishi kerak.',
    'unique' => ':attribute allaqachon mavjud.',
    'uploaded' => ':attribute yuklashda xatolik yuz berdi.',
    'uppercase' => ':attribute maydoni katta harflarda bo‘lishi kerak.',
    'url' => ':attribute maydoni to‘g‘ri URL bo‘lishi kerak.',
    'ulid' => ':attribute maydoni to‘g‘ri ULID bo‘lishi kerak.',
    'uuid' => ':attribute maydoni to‘g‘ri UUID bo‘lishi kerak.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Bu yerda siz aniq atributlar uchun qo‘shimcha (custom) xabarlar yozishingiz
    | mumkin. Format: "attribute.rule"
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Bu yerda :attribute o‘rniga ko‘rinadigan nomlarni yozib qo‘yishingiz mumkin.
    |
    */

    'attributes' => [
        'first_name' => 'Ism',
        'last_name' => 'Familiya',
        'phone' => 'Telefon raqam',
        'password' => 'Parol',
    ],

];
