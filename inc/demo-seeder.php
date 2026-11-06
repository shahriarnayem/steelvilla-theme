<?php
/**
 * Steel Villa Complete Demo Content Seeder
 * Populates exact live site data from https://steelvilla.com.bd
 */

if (!defined('ABSPATH')) {
    exit;
}

function steelvilla_seed_demo_content() {
    // Only run if not already seeded
    if (get_option('steelvilla_demo_seeded', false)) {
        return;
    }

    // 1. Seed 5 Hero Slides
    $heroes = array(
        array(
            'title'   => 'Your Trusted Steel Partner',
            'tagline' => 'Certified PEB Engineering',
            'desc'    => 'From design to delivery, we provide reliable and high-quality steel structure solutions for every industrial and commercial project across Bangladesh.',
            'img'     => 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1600&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Engineering Excellence in Steel',
            'tagline' => 'Precision & Safety',
            'desc'    => 'Steel Villa Engineering Ltd. ensures precision, safety, and durability in every structural component fabricated and erected.',
            'img'     => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1600&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Strong Foundations, Lasting Trust',
            'tagline' => 'Durability Guaranteed',
            'desc'    => 'We engineer pre-engineered buildings that stand strong against time, weather, and heavy industrial demands.',
            'img'     => 'https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?q=80&w=1600&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Customized PEB for Modern Needs',
            'tagline' => 'Tailored Industrial Design',
            'desc'    => 'Innovative steel framing customized to maximize your facility floor area, clearance, and operational efficiency.',
            'img'     => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=1600&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Delivering High-Quality Steel Buildings',
            'tagline' => 'Turnkey Execution',
            'desc'    => 'Complete end-to-end service including design, fabrication, supply, and on-site civil erection with full BNBC compliance.',
            'img'     => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1600&auto=format&fit=crop'
        )
    );

    foreach ($heroes as $idx => $h) {
        $post_id = wp_insert_post(array(
            'post_title'   => $h['title'],
            'post_content' => $h['desc'],
            'post_excerpt' => $h['desc'],
            'post_type'    => 'hero',
            'post_status'  => 'publish',
            'menu_order'   => $idx + 1
        ));
        if ($post_id) {
            update_post_meta($post_id, '_steelvilla_hero_tagline', $h['tagline']);
            update_post_meta($post_id, '_steelvilla_hero_img', $h['img']);
        }
    }

    // 2. Seed 6 Services
    $services = array(
        array(
            'title'   => 'Tailor-Made Steel Building Design & Development',
            'icon'    => 'fa-solid fa-drafting-compass',
            'excerpt' => 'Customized architectural planning and structural engineering using 3D modeling and TEKLA detailing.',
            'img'     => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Efficient Pre-Engineered Steel Building (PEB) Solutions',
            'icon'    => 'fa-solid fa-industry',
            'excerpt' => 'Cost-effective, rapid-assembly industrial sheds, warehouses, and factories engineered to AISC standards.',
            'img'     => 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?q=80&w=800&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Steel Structure Maintenance & Modernization',
            'icon'    => 'fa-solid fa-screwdriver-wrench',
            'excerpt' => 'Structural retrofit, corrosion protection, capacity expansion, and refurbishment for aging facilities.',
            'img'     => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=800&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Heavy-Duty Industrial Steel Infrastructure',
            'icon'    => 'fa-solid fa-warehouse',
            'excerpt' => 'Craneway structures, mezzanine flooring, heavy pipe racks, boiler sheds, and power plant facilities.',
            'img'     => 'https://images.unsplash.com/photo-1513828583688-c52646db42da?q=80&w=800&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Commercial-Grade Steel Building Construction',
            'icon'    => 'fa-solid fa-building',
            'excerpt' => 'Multi-storey office headquarters, showrooms, logistics distribution parks, and retail centers.',
            'img'     => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Agricultural & Farm-Specific Steel Structures',
            'icon'    => 'fa-solid fa-building-wheat',
            'excerpt' => 'Biosecure poultry housing, agro processing plants, grain silos, and cold storage warehouses.',
            'img'     => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?q=80&w=800&auto=format&fit=crop'
        )
    );

    foreach ($services as $idx => $s) {
        $post_id = wp_insert_post(array(
            'post_title'   => $s['title'],
            'post_content' => $s['excerpt'] . ' Steel Villa LTD. delivers end-to-end execution combining modern fabrication, certified welding, and rapid site erection.',
            'post_excerpt' => $s['excerpt'],
            'post_type'    => 'service',
            'post_status'  => 'publish',
            'menu_order'   => $idx + 1
        ));
        if ($post_id) {
            update_post_meta($post_id, '_steelvilla_service_icon', $s['icon']);
            update_post_meta($post_id, '_steelvilla_img', $s['img']);
        }
    }

    // 3. Seed Taxonomies & 21 Projects
    $status_completed = wp_insert_term('Completed Projects', 'project-status', array('slug' => 'completed-projects'));
    $status_ongoing   = wp_insert_term('Ongoing Projects', 'project-status', array('slug' => 'ongoing-projects'));

    $cat_factory   = wp_insert_term('Factory', 'project-category-', array('slug' => 'factory'));
    $cat_warehouse = wp_insert_term('Warehouse', 'project-category-', array('slug' => 'warehouse'));
    $cat_infra     = wp_insert_term('Infrastructure', 'project-category-', array('slug' => 'infrastructure'));
    $cat_comm      = wp_insert_term('Commercial', 'project-category-', array('slug' => 'commercial'));

    $projects = array(
        // Completed Projects
        array('title' => 'Diesel Tank, Spain Bangla Agro Industries Ltd', 'client' => 'Spain Bangla Agro Industries Ltd', 'loc' => 'Sunamgonj', 'status' => 'completed-projects', 'cat' => 'factory', 'img' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Canopy Works', 'client' => 'Confidential Client', 'loc' => 'Dhaka', 'status' => 'completed-projects', 'cat' => 'commercial', 'img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'GMS Knitting Industries Ltd (Recycle Building)', 'client' => 'GMS Composite Knitting Ind. Ltd', 'loc' => 'Gazipur', 'status' => 'completed-projects', 'cat' => 'factory', 'img' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'N Gen Pack', 'client' => 'N Gen Pack Ltd', 'loc' => 'Narayanganj', 'status' => 'completed-projects', 'cat' => 'warehouse', 'img' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'BBT Bridge, Spain Bangla Agro Industries Ltd', 'client' => 'Spain Bangla Agro Industries Ltd', 'loc' => 'Sunamgonj', 'status' => 'completed-projects', 'cat' => 'infrastructure', 'img' => 'https://images.unsplash.com/photo-1513828583688-c52646db42da?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Solar Control Panel, Spain Bangla Agro', 'client' => 'Spain Bangla Agro Industries Ltd', 'loc' => 'Sunamgonj', 'status' => 'completed-projects', 'cat' => 'infrastructure', 'img' => 'https://images.unsplash.com/photo-1509391365360-2e959784a276?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Boiler Shed, Spain Bangla Agro Industries Ltd', 'client' => 'Spain Bangla Agro Industries Ltd', 'loc' => 'Sunamgonj', 'status' => 'completed-projects', 'cat' => 'factory', 'img' => 'https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Main Building, Spain Bangla Agro Industries', 'client' => 'Spain Bangla Agro Industries Ltd', 'loc' => 'Sunamgonj', 'status' => 'completed-projects', 'cat' => 'factory', 'img' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Buffer Godown, Sunamgonj', 'client' => 'Ministry of Food / DG Food', 'loc' => 'Sunamgonj', 'status' => 'completed-projects', 'cat' => 'warehouse', 'img' => 'https://images.unsplash.com/photo-1587293852726-70cdb56c2866?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Buffer Godown, Gopalgonj', 'client' => 'Ministry of Food / DG Food', 'loc' => 'Gopalgonj', 'status' => 'completed-projects', 'cat' => 'warehouse', 'img' => 'https://images.unsplash.com/photo-1578575437130-527eed3abbec?q=80&w=800&auto=format&fit=crop'),

        // Ongoing Projects
        array('title' => 'Lift core, National Auto Rice Mills', 'client' => 'National Auto Rice Mills', 'loc' => 'Dinajpur', 'status' => 'ongoing-projects', 'cat' => 'factory', 'img' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Buffer Godown, Lalmonirhat (Site 2)', 'client' => 'DG Food', 'loc' => 'Lalmonirhat', 'status' => 'ongoing-projects', 'cat' => 'warehouse', 'img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Jeans Manufacturing Washing Ltd', 'client' => 'Jeans Manufacturing Ltd', 'loc' => 'Chittagong EPZ', 'status' => 'ongoing-projects', 'cat' => 'factory', 'img' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Building Extension Works, Envoy Textile Ltd', 'client' => 'Envoy Textile Ltd', 'loc' => 'Mymensingh', 'status' => 'ongoing-projects', 'cat' => 'factory', 'img' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'GMS Knitting Industries Ltd (GMS Recycle)', 'client' => 'GMS Composite Knitting Ltd', 'loc' => 'Gazipur', 'status' => 'ongoing-projects', 'cat' => 'factory', 'img' => 'https://images.unsplash.com/photo-1513828583688-c52646db42da?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Utility Steel Stair, Light Project, Akij Light House', 'client' => 'Akij Group', 'loc' => 'Dhaka', 'status' => 'ongoing-projects', 'cat' => 'commercial', 'img' => 'https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Shed Building, AKIJ Ispat', 'client' => 'AKIJ Ispat Ltd', 'loc' => 'Manikganj', 'status' => 'ongoing-projects', 'cat' => 'factory', 'img' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Buffer Godown, Kalurghat', 'client' => 'DG Food', 'loc' => 'Chittagong', 'status' => 'ongoing-projects', 'cat' => 'warehouse', 'img' => 'https://images.unsplash.com/photo-1587293852726-70cdb56c2866?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Buffer Godown Lalmonirhat (Site 1)', 'client' => 'DG Food', 'loc' => 'Lalmonirhat', 'status' => 'ongoing-projects', 'cat' => 'warehouse', 'img' => 'https://images.unsplash.com/photo-1578575437130-527eed3abbec?q=80&w=800&auto=format&fit=crop'),
        array('title' => 'Foothover Bridge, Mohongonj', 'client' => 'Bangladesh Railway / Local Govt', 'loc' => 'Mohongonj', 'status' => 'ongoing-projects', 'cat' => 'infrastructure', 'img' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800&auto=format&fit=crop')
    );

    foreach ($projects as $p) {
        $post_id = wp_insert_post(array(
            'post_title'   => $p['title'],
            'post_content' => 'Comprehensive PEB fabrication and civil execution for ' . $p['client'] . ' at ' . $p['loc'] . '.',
            'post_excerpt' => $p['client'] . ' | ' . $p['loc'],
            'post_type'    => 'project',
            'post_status'  => 'publish'
        ));
        if ($post_id) {
            update_post_meta($post_id, '_steelvilla_project_client', $p['client']);
            update_post_meta($post_id, '_steelvilla_project_location', $p['loc']);
            update_post_meta($post_id, '_steelvilla_img', $p['img']);
            wp_set_object_terms($post_id, $p['status'], 'project-status');
            wp_set_object_terms($post_id, $p['cat'], 'project-category-');
        }
    }

    // 4. Seed 12 Marquee Clients (CPT: project-review)
    $clients = array(
        'TMSS Engineering & Healthcare', 'Bangladesh Railway', 'Partex Star Group',
        'Noman Group Textiles', 'Fakir Apparels Ltd', 'Nourish Poultry & Feeds',
        'BSRM Steels', 'Akij Group', 'Envoy Textiles Ltd',
        'Square Pharmaceuticals', 'Meghna Group of Industries', 'Pran-RFL Group'
    );
    foreach ($clients as $c) {
        wp_insert_post(array(
            'post_title'   => $c,
            'post_content' => 'Trusted corporate client of Steel Villa LTD.',
            'post_type'    => 'project-review',
            'post_status'  => 'publish'
        ));
    }

    // 5. Seed 19 Steel Products
    $products = array(
        'Steel Roll', 'Steel Channel', 'Steel H-Beam', 'Steel Plate', 'Steel Angle',
        'Steel Square Tube', 'Steel Pipe', 'Steel Square Pipe', 'Carbon Steel Tube',
        'Stainless Steel Roll', 'Stainless Steel Strip', 'Stainless Steel Sheet',
        'Stainless Steel Bar', 'Stainless Steel Wire', 'Pre-painted Steel Coil',
        'Corrugated Board', 'Color Coated Plate', 'Elbow Pipe Fitting', 'Flanges (Plate, Slip-On, Weld Neck)'
    );
    foreach ($products as $idx => $prod) {
        $post_id = wp_insert_post(array(
            'post_title'   => $prod,
            'post_content' => 'Certified structural grade ' . $prod . ' supplied strictly in compliance with ASTM, EN, and JIS standards.',
            'post_type'    => 'product',
            'post_status'  => 'publish'
        ));
        if ($post_id) {
            update_post_meta($post_id, '_steelvilla_product_grade', 'Q235B / Q345B / SS304');
            update_post_meta($post_id, '_steelvilla_product_standard', 'ASTM A36, JIS G3101');
        }
    }

    // Mark as seeded
    update_option('steelvilla_demo_seeded', true);
}

// Hook to seed upon theme switch
add_action('after_switch_theme', 'steelvilla_seed_demo_content');
