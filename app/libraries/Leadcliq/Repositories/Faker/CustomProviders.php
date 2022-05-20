<?
/**
 * Extends Faker's providers
 */
namespace Leadcliq\Repositories\Faker;

class CustomProviders extends \Faker\Provider\Base
{
    protected static $circleFormaters = array(
        '{{industry}} {{circleDesc}} in {{state}}',
        '{{industry}} {{circleDesc}} in {{city}}',
        '{{city}} {{industry}} {{circleDesc}}',
        '{{state}} {{industry}} {{circleDesc}}',
        '{{industry}}, {{city}}',
        '{{industry}}, {{state}}',
        '{{industry}} in {{city}}',
        '{{industry}} in {{state}}',
        '{{city}}, {{state}}'
    );

    public function industry(){
        //returns values listed in IndustriesComposer
        $industries = array('Accommodation','Accommodation and Food Services','Administrative and Support and Waste Management and Remediation Services','Administrative and Support Services','Agriculture, Forestry, Fishing and Hunting','Air Transportation','Ambulatory Health Care Services','Amusement, Gambling, and Recreation Industries','Animal Production','Apparel Manufacturing','Arts, Entertainment, and Recreation','Beverage and Tobacco Product Manufacturing','Broadcasting','Building Material and Garden Equipment and Supplies Dealers','Chemical Manufacturing','Clothing and Clothing Accessories Stores','Computer and Electronic Product Manufacturing','Construction','Construction of Buildings','Couriers and Messengers','Credit Intermediation and Related Activities','Crop Production','Data Processing, Hosting, and Related Services','Education and Health Services','Educational Services','Electrical Equipment, Appliance, and Component Manufacturing','Electronics and Appliance Stores','Fabricated Metal Product Manufacturing','Finance and Insurance','Financial Activities','Fishing, Hunting and Trapping','Food and Beverage Stores','Food Manufacturing','Food Services and Drinking Places','Forestry and Logging','Funds, Trusts, and Other Financial Vehicles','Furniture and Home Furnishings Stores','Furniture and Related Product Manufacturing','Gasoline Stations','General Merchandise Stores','Goods-Producing Industries','Health and Personal Care Stores','Health Care and Social Assistance','Heavy and Civil Engineering Construction','Hospitals','Information Technology','Insurance Carriers and Related Activities','Internet Publishing and Broadcasting','Leather and Allied Product Manufacturing','Leisure and Hospitality','Lessors of Nonfinancial Intangible Assets','Machinery Manufacturing','Management of Companies and Enterprises','Manufacturing','Merchant Wholesalers, Durable Goods','Merchant Wholesalers, Nondurable Goods','Mining','Mining, Quarrying, and Oil and Gas Extraction','Miscellaneous Manufacturing','Miscellaneous Store Retailers','Monetary Authorities - Central Bank','Motion Picture and Sound Recording Industries','Motor Vehicle and Parts Dealers','Museums, Historical Sites, and Similar Institutions','Natural Resources and Mining','Nonmetallic Mineral Product Manufacturing','Nonstore Retailers','Nursing and Residential Care Facilities','Oil and Gas Extraction','Other Information Services','Other Services','Paper Manufacturing','Performing Arts, Spectator Sports, and Related Industries','Personal and Laundry Services','Petroleum and Coal Products Manufacturing','Pipeline Transportation','Plastics and Rubber Products Manufacturing','Postal Service','Primary Metal Manufacturing','Printing and Related Support Activities','Private Households','Professional and Business Services','Professional, Scientific, and Technical Services','Publishing Industries','Rail Transportation','Real Estate','Real Estate and Rental and Leasing','Religious, Grantmaking, Civic, Professional, and Similar Organizations','Rental and Leasing Services','Repair and Maintenance','Retail Trade','Scenic and Sightseeing Transportation','Securities, Commodity Contracts, and Other Financial Investments and Related Activities','Service-Providing Industries','Social Assistance','Specialty Trade Contractors','Sporting Goods, Hobby, Book, and Music Stores','Support Activities for Agriculture and Forestry','Support Activities for Mining','Support Activities for Transportation','Telecommunications','Textile Mills','Textile Product Mills','Trade, Transportation, and Utilities','Transit and Ground Passenger Transportation','Transportation and Warehousing','Transportation Equipment Manufacturing','Truck Transportation','Utilities','Warehousing and Storage','Waste Management and Remediation Services','Water Transportation','Wholesale Electronic Markets and Agents and Brokers','Wholesale Trade','Wood Product Manufacturing');
        $industry = static::randomElement($industries);
        return $industry;
    }

    /**
     * Creates titles for circles
     * Creates circles lke "Administrative and Supportive System Gurus in San Francisco"
     */
    public function circleTitle(){
        $format = static::randomElement(self::$circleFormaters);
        $circle = $this->generator->parse($format);
        return $circle;
    }

    /**
     * Typically on linkedin you'll see group names like 'Print Industry Gurus, San Francisco".
     * We can grab the first part from ->industries, last part from ->cities, we just need the little descriptive burlb
     */
    public function circleDesc(){
        $groupDescriptions = array('Gurus','Experts','Affiliates','Industry','Networking');
        $circleDesc = static::randomElement($groupDescriptions);
        return $circleDesc;
    }
}
?>