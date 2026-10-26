<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Setting;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        MenuItem::query()->delete();
        Category::query()->delete();

        // Settings
        Setting::updateOrCreate(['key' => 'name'], ['value' => 'Hari Om Cuisine Of India']);
        Setting::updateOrCreate(['key' => 'short_name'], ['value' => 'Hari Om']);
        Setting::updateOrCreate(['key' => 'address'], ['value' => '1528 S Cushman St, Fairbanks, AK 99701, United States']);
        Setting::updateOrCreate(['key' => 'address_short'], ['value' => '1528 S Cushman St · Fairbanks, Alaska']);
        Setting::updateOrCreate(['key' => 'phone'], ['value' => '+1 907-328-3218']);
        Setting::updateOrCreate(['key' => 'phone_href'], ['value' => 'tel:+19073283218']);
        Setting::updateOrCreate(['key' => 'map_url'], ['value' => 'https://www.google.com/maps/search/?api=1&query=1528+S+Cushman+St,+Fairbanks,+AK+99701']);
        Setting::updateOrCreate(['key' => 'hours_weekday'], ['value' => 'Tue–Sun: 11:30 AM – 2:30 PM & 4:30 PM – 9:00 PM']);
        Setting::updateOrCreate(['key' => 'hours_monday'], ['value' => 'Monday: Closed']);
        Setting::updateOrCreate(['key' => 'tagline'], ['value' => 'Traditional Indian cooking in Fairbanks, Alaska. From the tandoor to the thali.']);

        $category_0 = Category::updateOrCreate(
            ['slug' => 'appetizers'],
            [
                'name' => 'Appetizers',
                'tagline' => 'Crisp, hot and made to order',
                'layout' => 'standard',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Papad',
            'price' => 10,
            'price_label' => '$10',
            'description' => 'Indian-style tostada chips made from chickpea flour. Served with tamarind & green chutneys.',
            'tags' => ["GF","V"],
            'image' => 'papad',
            'details' => null,
            'sort_order' => 1,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Masala Papad',
            'price' => 14,
            'price_label' => '$14',
            'description' => 'Indian-style tostada chips topped with diced tomatoes, onions, green chilies, cilantro and chaat masala.',
            'tags' => [],
            'image' => 'papad',
            'details' => null,
            'sort_order' => 2,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Masala Fries',
            'price' => 14,
            'price_label' => '$14',
            'description' => 'Crispy potato fries sprinkled with chaat masala. Served with tamarind & green chutneys.',
            'tags' => ["GF"],
            'image' => 'fries',
            'details' => null,
            'sort_order' => 3,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Vegetable Samosas',
            'price' => 14,
            'price_label' => '$14',
            'description' => 'Two large deep-fried pastries stuffed with spiced mashed potatoes and green peas. Served with tamarind and green chutneys.',
            'tags' => ["V"],
            'image' => 'samosas',
            'details' => null,
            'sort_order' => 4,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Vegetable Pakoras',
            'price' => 14,
            'price_label' => '$14',
            'description' => 'Mixed vegetable fritters battered in chickpea flour and Indian spices. Served with tamarind & green chutney.',
            'tags' => ["GF","V"],
            'image' => 'pakoras',
            'details' => null,
            'sort_order' => 5,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Onion Pakoras',
            'price' => 14,
            'price_label' => '$14',
            'description' => 'Crispy fritters made with onion slices, chickpea flour and Indian spices. Served with tamarind and green chutneys.',
            'tags' => ["GF","V"],
            'image' => 'pakoras',
            'details' => null,
            'sort_order' => 6,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Spinach Pakoras',
            'price' => 14,
            'price_label' => '$14',
            'description' => 'Crispy fritters made with fresh spinach, chickpea flour and Indian spices. Served with tamarind & green chutney.',
            'tags' => ["GF","V"],
            'image' => 'pakoras',
            'details' => null,
            'sort_order' => 7,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Salt and Pepper Shrimp',
            'price' => 20,
            'price_label' => '$20',
            'description' => 'Deep-fried shrimp with a crispy batter, sautéed in a pan with crushed red chili, salt and pepper.',
            'tags' => [],
            'image' => 'shrimp',
            'details' => null,
            'sort_order' => 8,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Cut Mirch Pakora',
            'price' => 14,
            'price_label' => '$14',
            'description' => 'Spicy green chili fritters battered in chickpea flour and Indian spices. Served with tamarind and green chutneys.',
            'tags' => [],
            'image' => 'pakoras',
            'details' => null,
            'sort_order' => 9,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Chicken Pakoras',
            'price' => 16,
            'price_label' => '$16',
            'description' => 'Chicken fritters battered in rice flour and Indian spices. Served with tamarind & green chutney.',
            'tags' => ["GF"],
            'image' => 'friedChicken',
            'details' => null,
            'sort_order' => 10,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_0->id,
            'name' => 'Chicken Majestics',
            'price' => 18,
            'price_label' => '$18',
            'description' => 'Deep-fried chicken strips battered in rice flour, yogurt and Indian spices. Tempered with mustard seeds and green chilies.',
            'tags' => ["GF"],
            'image' => 'friedChicken',
            'details' => null,
            'sort_order' => 11,
            'is_available' => true,
        ]);

        $category_1 = Category::updateOrCreate(
            ['slug' => 'soups'],
            [
                'name' => 'Soups',
                'tagline' => 'A warm bowl for a cold Fairbanks evening',
                'layout' => 'standard',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );
        MenuItem::create([
            'category_id' => $category_1->id,
            'name' => 'Tomato Soup',
            'price' => 10,
            'price_label' => '$10',
            'description' => 'Slow-simmered tomatoes with ginger and warm Indian spices, finished with cream.',
            'tags' => ["GF","V"],
            'image' => 'soup',
            'details' => null,
            'sort_order' => 1,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_1->id,
            'name' => 'Chicken Ginger Soup',
            'price' => 10,
            'price_label' => '$10',
            'description' => 'Clear chicken broth scented with fresh ginger, black pepper and cilantro.',
            'tags' => ["GF"],
            'image' => 'soup',
            'details' => null,
            'sort_order' => 2,
            'is_available' => true,
        ]);

        $category_2 = Category::updateOrCreate(
            ['slug' => 'veg-entrees'],
            [
                'name' => 'Veg Entrees',
                'tagline' => 'Vegetarian curries from the North',
                'layout' => 'standard',
                'sort_order' => 3,
                'is_active' => true,
            ]
        );
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Dhaba Dal',
            'price' => 20,
            'price_label' => '$20',
            'description' => 'Rich and creamy yellow lentils seasoned with cumin, cilantro and Indian spices.',
            'tags' => ["GF","V"],
            'image' => 'dal',
            'details' => null,
            'sort_order' => 1,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Chana Masala',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Delicious North Indian curried sauce of chickpeas, tomatoes and Indian spices.',
            'tags' => ["GF","V"],
            'image' => 'dal',
            'details' => null,
            'sort_order' => 2,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Aloo Matar',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'North Indian curry of potatoes and green peas in a hearty onion and tomato sauce with home-ground spices.',
            'tags' => ["GF","V"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 3,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Tawa Veg',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Mixed vegetables in a savory onion sauce flavored with tawa masala.',
            'tags' => ["GF"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 4,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Jeera Aloo',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'North Indian-style dish of potatoes and cumin sautéed with chopped onion, tomato and Indian spices.',
            'tags' => ["GF","V"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 5,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Vegetable Biryani',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Mixed vegetables with fragrant basmati rice seasoned with Indian spices, mint leaves and saffron. Served with a side of refreshing raitha.',
            'tags' => ["GF"],
            'image' => 'biryani',
            'details' => null,
            'sort_order' => 6,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Mutter Paneer',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Paneer cheese with green peas in a tomato base, cashew sauce and Indian spices.',
            'tags' => ["GF"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 7,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Karahi Paneer',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Paneer cheese in a savory sauce with tomatoes, bell peppers, onion, Indian spices and fenugreek leaves.',
            'tags' => ["GF"],
            'image' => 'paneer',
            'details' => null,
            'sort_order' => 8,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Palak Paneer',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Paneer cheese in a curried sauce of fresh spinach seasoned with garlic, mustard seeds and garam masala.',
            'tags' => ["GF"],
            'image' => 'palak',
            'details' => null,
            'sort_order' => 9,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Shahi Paneer',
            'price' => 26,
            'price_label' => '$26',
            'description' => 'Mashed paneer cheese in a creamy tomato sauce with cream, puréed cashews and Indian spices.',
            'tags' => ["GF","N"],
            'image' => 'paneer',
            'details' => null,
            'sort_order' => 10,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Aloo Palak',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Potatoes in a curried sauce of fresh spinach seasoned with garlic, mustard seeds and garam masala.',
            'tags' => ["GF","V"],
            'image' => 'palak',
            'details' => null,
            'sort_order' => 11,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Aloo Gobi',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Potatoes and cauliflower in a delicious tomato and onion sauce with cilantro and Indian spices.',
            'tags' => ["GF","V"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 12,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Palak Mushroom',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Mushrooms in a curried sauce of fresh spinach seasoned with garlic, mustard seeds and garam masala.',
            'tags' => ["GF"],
            'image' => 'palak',
            'details' => null,
            'sort_order' => 13,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Mushroom Matar Masala',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Mushrooms and green peas in a rich tomato base cashew sauce seasoned with cumin seeds, cardamom and Indian spices.',
            'tags' => ["GF"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 14,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Kashmiri Dum Aloo',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Baby potatoes cooked in an onion-based sauce with cashew, heavy cream, tomato purée and Indian spices. Finished with fennel and cardamom powder.',
            'tags' => ["GF","N"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 15,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Malai Kofta',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Deep-fried potato balls stuffed with raisin in a slightly sweetened tomato sauce with cream, puréed cashews, Indian spices and cardamom powder.',
            'tags' => ["GF","N"],
            'image' => 'paneer',
            'details' => null,
            'sort_order' => 16,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Korma',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Choice of mixed vegetables or paneer in a delectable sauce of cream, puréed cashews and Indian spices.',
            'tags' => ["GF","N"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 17,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Makhani',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Choice of mixed vegetables or paneer in a rich, buttery tomato sauce with cream, puréed cashews and Indian spices.',
            'tags' => ["GF","N"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 18,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Tikka Masala',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Choice of mixed vegetables or paneer in a savory tomato sauce with cream, puréed cashews and Indian spices.',
            'tags' => ["GF","N"],
            'image' => 'tikka',
            'details' => null,
            'sort_order' => 19,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Bhindi Do Payza',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Flavorful North Indian dish of okra, onions, spicy red chilies and Indian spices.',
            'tags' => ["GF","V"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 20,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Gobi Matar',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Cauliflower and green peas sautéed with chopped onion, tomato, fresh cilantro, cumin seeds and Indian spices.',
            'tags' => ["GF","V"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 21,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Paneer Tikka Masala',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Marinated paneer cheese served in spiced gravy.',
            'tags' => ["GF"],
            'image' => 'paneer',
            'details' => null,
            'sort_order' => 22,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_2->id,
            'name' => 'Vindaloo',
            'price' => 15,
            'price_label' => '$15',
            'description' => 'Portuguese potato dish cooked in vinegar with tomato, green chilies, ginger and garlic.',
            'tags' => ["GF","V"],
            'image' => 'vegCurry',
            'details' => null,
            'sort_order' => 23,
            'is_available' => true,
        ]);

        $category_3 = Category::updateOrCreate(
            ['slug' => 'non-veg-entrees'],
            [
                'name' => 'Non Veg Entrees',
                'tagline' => 'Pick your sauce, then pick your protein',
                'layout' => 'standard',
                'sort_order' => 4,
                'is_active' => true,
            ]
        );
        MenuItem::create([
            'category_id' => $category_3->id,
            'name' => 'Malabar Curry',
            'price' => 26,
            'price_label' => 'from $26',
            'description' => 'This tangy curry is made with onion paste, tomatoes, ginger and garlic, seasoned with tamarind, coriander and coconut cream.',
            'tags' => ["GF"],
            'image' => 'lamb',
            'details' => null,
            'sort_order' => 1,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_3->id,
            'name' => 'Pepper Masala',
            'price' => 26,
            'price_label' => 'from $26',
            'description' => 'Best prepared with lamb or goat, this spicy tomato curry with bell peppers and onions is seasoned with black peppercorns, green chilies, garlic and Indian spices.',
            'tags' => ["GF"],
            'image' => 'lamb',
            'details' => null,
            'sort_order' => 2,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_3->id,
            'name' => 'Rogan Josh',
            'price' => 26,
            'price_label' => 'from $26',
            'description' => 'Best prepared with lamb or goat, this delectable curry is blended with tomatoes and seasoned with cardamom, cloves, fennel and Indian spices.',
            'tags' => ["GF"],
            'image' => 'lamb',
            'details' => null,
            'sort_order' => 3,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_3->id,
            'name' => 'Saag',
            'price' => 26,
            'price_label' => 'from $26',
            'description' => 'Hearty North Indian style curry with fresh spinach, garlic, mustard seeds and warm spices.',
            'tags' => ["GF"],
            'image' => 'palak',
            'details' => null,
            'sort_order' => 4,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_3->id,
            'name' => 'Curry',
            'price' => 26,
            'price_label' => 'from $26',
            'description' => 'A fragrant curried onion-based tomato sauce with cilantro and Indian spices, finished with fresh cilantro.',
            'tags' => ["GF"],
            'image' => 'tikka',
            'details' => null,
            'sort_order' => 5,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_3->id,
            'name' => 'Achari Curry',
            'price' => 26,
            'price_label' => 'from $26',
            'description' => 'Tangy curry blended with tomatoes, onion and yogurt, then seasoned with green chilies, ginger-garlic paste and Indian pickling spices. Finished with a purée of mango pickle.',
            'tags' => ["GF"],
            'image' => 'lamb',
            'details' => null,
            'sort_order' => 6,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_3->id,
            'name' => 'Bhuna Masala',
            'price' => 26,
            'price_label' => 'from $26',
            'description' => 'North Indian dish of sautéed chopped tomatoes, onions, ginger, garlic and garam masala. Finished with cilantro.',
            'tags' => ["GF"],
            'image' => 'lamb',
            'details' => null,
            'sort_order' => 7,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_3->id,
            'name' => 'Karahi',
            'price' => 26,
            'price_label' => 'from $26',
            'description' => 'A savory onion-based sauce with bell peppers, onions, tomatoes and Indian spices.',
            'tags' => ["GF"],
            'image' => 'tikka',
            'details' => null,
            'sort_order' => 8,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_3->id,
            'name' => 'Biryani',
            'price' => 26,
            'price_label' => 'from $26',
            'description' => 'Fragrant basmati rice seasoned with Indian spices and saffron. Served with a side of refreshing raitha.',
            'tags' => ["GF"],
            'image' => 'biryani',
            'details' => null,
            'sort_order' => 9,
            'is_available' => true,
        ]);

        $category_4 = Category::updateOrCreate(
            ['slug' => 'thali'],
            [
                'name' => 'Thali Platter',
                'tagline' => 'Available all day',
                'layout' => 'standard',
                'sort_order' => 5,
                'is_active' => true,
            ]
        );
        MenuItem::create([
            'category_id' => $category_4->id,
            'name' => 'Veg Platter',
            'price' => 24,
            'price_label' => '$24',
            'description' => 'Chef\'s choice of four vegetarian dishes with basmati rice, naan, papad, raitha and dessert.',
            'tags' => ["V"],
            'image' => 'thali',
            'details' => null,
            'sort_order' => 1,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_4->id,
            'name' => 'Non Veg Platter',
            'price' => 26,
            'price_label' => '$26',
            'description' => 'Chef\'s choice of four dishes with one chicken dish, basmati rice, naan, papad, raitha and dessert.',
            'tags' => [],
            'image' => 'thali',
            'details' => null,
            'sort_order' => 2,
            'is_available' => true,
        ]);

        $category_5 = Category::updateOrCreate(
            ['slug' => 'accompaniments'],
            [
                'name' => 'Accompaniments',
                'tagline' => 'Breads and cooling sides',
                'layout' => 'standard',
                'sort_order' => 6,
                'is_active' => true,
            ]
        );
        MenuItem::create([
            'category_id' => $category_5->id,
            'name' => 'Naan',
            'price' => 6,
            'price_label' => '$6',
            'description' => 'Hand-stretched and baked against the wall of the tandoor.',
            'tags' => ["V"],
            'image' => 'naan',
            'details' => null,
            'sort_order' => 1,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_5->id,
            'name' => 'Raitha',
            'price' => 6,
            'price_label' => '$6',
            'description' => 'Cooling yogurt with cucumber, carrot and roasted cumin.',
            'tags' => ["GF","V"],
            'image' => 'soup',
            'details' => null,
            'sort_order' => 2,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_5->id,
            'name' => 'Garlic Naan',
            'price' => 8,
            'price_label' => '$8',
            'description' => 'Tandoor naan brushed with garlic butter and fresh cilantro.',
            'tags' => ["V"],
            'image' => 'naan',
            'details' => null,
            'sort_order' => 3,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_5->id,
            'name' => 'Mango Achar Pickle',
            'price' => 4,
            'price_label' => '$4',
            'description' => 'House mango pickle — tangy, salty and hot.',
            'tags' => ["V"],
            'image' => 'papad',
            'details' => null,
            'sort_order' => 4,
            'is_available' => true,
        ]);

        $category_6 = Category::updateOrCreate(
            ['slug' => 'wine'],
            [
                'name' => 'Wine',
                'tagline' => 'By the glass',
                'layout' => 'lists',
                'sort_order' => 7,
                'is_active' => true,
            ]
        );
        MenuItem::create([
            'category_id' => $category_6->id,
            'name' => 'Red Wine',
            'price' => 0,
            'price_label' => '$12 Glass',
            'description' => '',
            'tags' => [],
            'image' => 'redWine',
            'details' => ["Catenary Cabernet Sauvignon, Argentina","Broadside Margarita Cabernet Sauvignon, California","Argyle Pinot Noir, Oregon","Cloudline Pinot Noir, Oregon","Hahn Pinot Noir, California","Guigal Côtes du Rhône Rouge, France","Coltibuono Chianti Cetamura, Italy","Marques de Cáceres Rioja Red, Spain"],
            'sort_order' => 1,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_6->id,
            'name' => 'White Wine',
            'price' => 0,
            'price_label' => '$12 Glass',
            'description' => '',
            'tags' => [],
            'image' => 'whiteWine',
            'details' => ["Guigal Côtes du Rhône Blanc, France","Chehalem INOX Unoaked Chardonnay, Oregon","Hahn Chardonnay, California","Villa Wolf Gewürztraminer, Germany","Lageder Riff Pinot Grigio, Italy","Ponzi Pinot Gris, Oregon","Clean Slate Riesling, Germany","Saracco Moscato d\'Asti, Italy"],
            'sort_order' => 2,
            'is_available' => true,
        ]);

        $category_7 = Category::updateOrCreate(
            ['slug' => 'beer'],
            [
                'name' => 'Beer',
                'tagline' => 'Alaskan taps and familiar favorites',
                'layout' => 'standard',
                'sort_order' => 8,
                'is_active' => true,
            ]
        );
        MenuItem::create([
            'category_id' => $category_7->id,
            'name' => 'Miller Lite',
            'price' => 5,
            'price_label' => '$5',
            'description' => '',
            'tags' => [],
            'image' => 'beer',
            'details' => null,
            'sort_order' => 1,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_7->id,
            'name' => 'Anchor Stream',
            'price' => 5,
            'price_label' => '$5',
            'description' => '',
            'tags' => [],
            'image' => 'beer',
            'details' => null,
            'sort_order' => 2,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_7->id,
            'name' => 'Estrella Jalisco',
            'price' => 8,
            'price_label' => '$8',
            'description' => '',
            'tags' => [],
            'image' => 'beer',
            'details' => null,
            'sort_order' => 3,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_7->id,
            'name' => 'Honeymoon Heff',
            'price' => 8,
            'price_label' => '$8',
            'description' => '',
            'tags' => [],
            'image' => 'beer',
            'details' => null,
            'sort_order' => 4,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_7->id,
            'name' => 'Indian Pale Ale Twister Creek',
            'price' => 8,
            'price_label' => '$8',
            'description' => '',
            'tags' => [],
            'image' => 'beer',
            'details' => null,
            'sort_order' => 5,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_7->id,
            'name' => 'Guinness Draught Stout',
            'price' => 8,
            'price_label' => '$8',
            'description' => '',
            'tags' => [],
            'image' => 'beer',
            'details' => null,
            'sort_order' => 6,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_7->id,
            'name' => 'Forty Ninth Alaska 8 Star',
            'price' => 8,
            'price_label' => '$8',
            'description' => '',
            'tags' => [],
            'image' => 'beer',
            'details' => null,
            'sort_order' => 7,
            'is_available' => true,
        ]);
        MenuItem::create([
            'category_id' => $category_7->id,
            'name' => 'Blonde Eagle Ale',
            'price' => 8,
            'price_label' => '$8',
            'description' => '',
            'tags' => [],
            'image' => 'beer',
            'details' => null,
            'sort_order' => 8,
            'is_available' => true,
        ]);
    }
}
