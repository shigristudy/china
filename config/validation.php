<?php

return [
    'superadmin' => [
      'create_role' => [
          'title' => [
              'name' => 'Title',
              'rules' => 'required',
              'message' => ['required' => 'The Title field is required']
          ],
          'description' => [
              'name' => 'Description',
              'rules' => 'required',
              'message' => ['required' => 'The Description field is required']
          ]
      ]
    ],
    'admin' => [
        'create_agent' => [
            'username' => [
                'name' => 'Username',
                'rules' => 'required|min:6|max:12|unique:agents',
                'message' => ['required' => 'The Username field is required.','min' => 'Username is at least 6 digits', 'max' => 'Username is up to 12 digits','unique' => 'This username already exists']
            ],
            'password' => [
                'name' => 'Password',
                'rules' => 'required|min:6|max:12|confirmed',
                'message' => ['required' => 'The Password field is required.','min' => 'Password is at least 6 digits', 'max' => 'Password up to 12 digits','confirmed' => 'Two password entries are inconsistent']
            ],
        ],
        'edit_agent' => [
            'username' => [
                'name' => 'Username',
                'rules' => 'required|min:6|max:12',
                'message' => ['required' => 'The Username field is required.','min' => 'Username is at least 6 digits', 'max' => 'Username is up to 12 digits']
            ],
            'password' => [
                'name' => 'Password',
                'rules' => 'confirmed',
                'message' => ['confirmed' => 'Two password confirmation does not match.']
            ],
        ],
        'create_user' => [
            'username' => [
                'name' => 'Username',
                'rules' => 'required|min:6|max:12|unique:users',
                'message' => ['required' => 'The Username field is required.','min' => 'Username is at least 6 digits', 'max' => 'Username is up to 12 digits','unique' => 'This username already exists']
            ],
            'phone_number' => [
                'name' => 'Phone Number',
                'rules' => 'required|min:10|max:15|unique:users',
                'message' => ['required' => 'Phone number field is required.','min' => 'Phone number is at least 10 digits', 'max' => 'phone number is up to 15 digits']
            ],
            'password' => [
                'name' => 'Password',
                'rules' => 'required|min:6|max:12|confirmed',
                'message' => ['required' => 'Password field is required.','min' => 'Password is at least 6 digits', 'max' => 'Password up to 12 digits','confirmed' => 'The password confirmation does not match.']
            ],
        ],
        'edit_user' => [
            'username' => [
                'name' => 'Username',
                'rules' => 'required|min:6|max:12',
                'message' => ['required' => 'The Username field is required.','min' => 'Username is at least 6 digits', 'max' => 'Username is up to 12 digits']
            ],
            'phone_number' => [
                'name' => 'Phone Number',
                'rules' => 'required|min:10|max:15',
                'message' => ['required' => 'Phone number field is required.','min' => 'phone number is at least 10 digits', 'max' => 'phone number is up to 15 digits']
            ],
            'password' => [
                'name' => 'Password',
                'rules' => 'confirmed',
                'message' => ['confirmed' => 'Password confirmation does not match.']
            ],
        ],

    ],
    'web' => [
        'change_password' => [
            // 'old_password' => [
            //     'name' => 'Old Password',
            //     'rules' => 'required',
            //     'message' => ['required' => 'The Old Password field is required.']
            // ],
            'password' => [
                'name' => 'Password',
                'rules' => 'required|min:6|max:12|confirmed',
                'message' => ['required' => 'The password field is required.','min' => 'Password is at least 6 digits', 'max' => 'Password up to 12 digits','confirmed' => 'Password confirmation does not match']
            ],
        ],
        'change_name' => [
            'name' => [
                'name' => 'Name',
                'rules' => 'required',
                'message' => ['required' => 'The name field is required.']
            ],
        ],
        'change_passcode' => [
            'passcode' => [
                'name' => 'PassCode',
                'rules' => 'required|digits:4',
                'message' => ['required' => 'The name field is required.', 'digits' => 'PassCode should be 4 digits.']
            ],
        ],
        'create_customer' => [
            'first_name' => [
                'name' => 'First name',
                'rules' => 'required',
                'message' => ['required' => 'The First name field is required.']
            ],
            'last_name' => [
                'name' => 'Last name',
                'rules' => 'required',
                'message' => ['required' => 'The Last name field is required.']
            ],
            'email' => [
                'name' => 'Email',
                'rules' => 'required|unique:users',
                'message' => ['required' => 'The Email field is required.', 'unique' => 'This email already exists']
            ],
            'company' => [
                'name' => 'Company',
                'rules' => 'required',
                'message' => ['required' => 'The Company field is required']
            ],
            'password' => [
                'name' => 'Password',
                'rules' => 'required|string|min:8|max:20',
                'message' => ['required' => 'Password field is required.','min' => 'Password is at least 8 digits', 'max' => 'Password up to 20 digits']
            ],

        ],
        'update_customer' => [
            'first_name' => [
                'name' => 'First name',
                'rules' => 'required',
                'message' => ['required' => 'The First name field is required.']
            ],
            'last_name' => [
                'name' => 'Last name',
                'rules' => 'required',
                'message' => ['required' => 'The Last name field is required.']
            ],
            'email' => [
                'name' => 'Email',
                'rules' => 'required',
                'message' => ['required' => 'The Email field is required.']
            ],
//            'street' => [
//                'name' => 'Street',
//                'rules' => 'required',
//                'message' => ['required' => 'The Street field is required']
//            ],
//            'house_number' => [
//                'name' => 'House Number',
//                'rules' => 'required',
//                'message' => ['required' => 'The House number field is required']
//            ],
//            'zip_code' => [
//                'name' => 'Zip',
//                'rules' => 'required',
//                'message' => ['required' => 'The Zip field is required']
//            ],
//            'city' => [
//                'name' => 'City',
//                'rules' => 'required',
//                'message' => ['required' => 'The City field is required']
//            ],
//            'country' => [
//                'name' => 'Country',
//                'rules' => 'required',
//                'message' => ['required' => 'The Country field is required']
//            ],
//            'company' => [
//                'name' => 'Company',
//               'rules' => 'required',
//                'message' => ['required' => 'The Company field is required']
//            ],
//            'phone_number' => [
//                'name' => 'Phone Number',
//                'rules' => 'required|min:10|max:15',
//                'message' => ['required' => 'Phone number field is required.','min' => 'Phone number is at least 10 digits', 'max' => 'phone number is up to 15 digits']
//            ],
        ]
    ],
];