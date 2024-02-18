use Illuminate\Database\Seeder;
use App\Models\Product; // Assuming your Product model namespace

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Wheat
        Product::create([
            'prod_category_id' => 1,
            'prod_name' => 'Wheat',
            'prod_original_price' => 50,
            'prod_offer_status' => 1,
            'prod_offer_price' => 40,
            'prod_badge_status' => 1,
            'prod_badge_text' => 'Save 20%',
            'prod_img' => 'wheat_image.jpg',
            'prod_details' => 'Nutrient-rich and versatile, wheat is a staple cereal grain.',
            'product_description' => 'Wheat is a cereal grain that has been cultivated for thousands of years and is one of the world\'s most important food crops.',
            'prod_status' => 1,
        ]);

        // Jowar
        Product::create([
            'prod_category_id' => 2,
            'prod_name' => 'Jowar',
            'prod_original_price' => 60,
            'prod_offer_status' => 1,
            'prod_offer_price' => 50,
            'prod_badge_status' => 1,
            'prod_badge_text' => 'Save 16.67%',
            'prod_img' => 'jowar_image.jpg',
            'prod_details' => 'Jowar, also known as sorghum, is a gluten-free grain with high nutritional value.',
            'product_description' => 'Jowar is an ancient cereal grain that has been cultivated for centuries. It is rich in nutrients like fiber, protein, and minerals.',
            'prod_status' => 1,
        ]);

        // Bajra
        Product::create([
            'prod_category_id' => 3,
            'prod_name' => 'Bajra',
            'prod_original_price' => 45,
            'prod_offer_status' => 1,
            'prod_offer_price' => 35,
            'prod_badge_status' => 1,
            'prod_badge_text' => 'Save 22.22%',
            'prod_img' => 'bajra_image.jpg',
            'prod_details' => 'Bajra, also known as pearl millet, is a nutritious grain widely consumed in India.',
            'product_description' => 'Bajra is a gluten-free grain that is rich in fiber, protein, and essential minerals like iron and magnesium.',
            'prod_status' => 1,
        ]);

        // Barley
        Product::create([
            'prod_category_id' => 4,
            'prod_name' => 'Barley',
            'prod_original_price' => 55,
            'prod_offer_status' => 1,
            'prod_offer_price' => 45,
            'prod_badge_status' => 1,
            'prod_badge_text' => 'Save 18.18%',
            'prod_img' => 'barley_image.jpg',
            'prod_details' => 'Barley is a versatile grain with a rich nutty flavor and numerous health benefits.',
            'product_description' => 'Barley is a cereal grain that is commonly used in soups, stews, and salads. It is high in fiber, vitamins, and minerals.',
            'prod_status' => 1,
        ]);

        // Besan
        Product::create([
            'prod_category_id' => 5,
            'prod_name' => 'Besan',
            'prod_original_price' => 40,
            'prod_offer_status' => 1,
            'prod_offer_price' => 30,
            'prod_badge_status' => 1,
            'prod_badge_text' => 'Save 25%',
            'prod_img' => 'besan_image.jpg',
            'prod_details' => 'Besan, also known as chickpea flour, is a gluten-free flour commonly used in Indian cooking.',
            'product_description' => 'Besan is made from ground chickpeas and is a staple ingredient in many Indian dishes like pakoras, bhajis, and sweets.',
            'prod_status' => 1,
        ]);
    }
}
