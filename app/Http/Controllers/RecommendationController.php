<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index()
    {
        return view('user.recommendationform');
    }

    public function submit(Request $request)
{
    // Validate input
    $data = $request->validate([
        'name' => 'required|string',
        'age' => 'required|integer',
        'goal' => 'required|string',
        'coverage' => 'required|string',
        'medical_concern' => 'required|string',
        'lifestyle' => 'required|string',
        'dependents' => 'required|string',
        'salary' => 'required|integer',
        'budget' => 'required|string',
        'insurance' => 'required|string',
        'gender' => 'nullable|string',
        'health_status' => 'required|string'
    ]);

    // Initialize plan categories
    $plans = [
        'Medical' => [],
        'Critical' => [],
        'Life' => [],
    ];

    // ===== First Layer: Budget & Salary =====
    if ($data['salary'] < 2500 || $data['budget'] === 'low') {
        $plans['Life'][] = 'PRUTerm';
    } elseif ($data['budget'] === 'medium' && $data['salary'] < 5000) {
        $plans['Life'][] = 'PRUWith You Plus';
    } elseif ($data['budget'] === 'high' && $data['salary'] >= 5000) {
        $plans['Life'][] = 'PRUWith You Plus';
    }

    // ===== Second Layer: Goal =====
    switch ($data['goal']) {
        case 'critical_illness':
            $plans['Critical'][] = 'PRUMy Critical Care';
            break;

        case 'medical':
            $plans['Medical'][] = 'PRUMillion Med';
            break;

        case 'savings':
        case 'protection':
            $plans['Life'][] = 'PRUWith You Plus';
            break;
    }

    // ===== Lifestyle Adjustments =====
    if ($data['goal'] === 'medical' && $data['lifestyle'] === 'active') {
        $plans['Medical'][] = 'PRUMillion Med Active';
    }

    // ===== Long-Term Hospital Coverage Adjustments =====
    if ($data['goal'] === 'medical' && $data['coverage'] === 'lifetime' && $data['salary'] >= 3000) {
        $plans['Medical'][] = 'PRUValue Med';
    }

    // ===== Gender-Based Add-On for Critical Care =====
    if (in_array('PRUMy Critical Care', $plans['Critical'])) {
        if ($data['gender'] === 'female') $plans['Critical'][] = 'PRULady';
        if ($data['gender'] === 'male') $plans['Critical'][] = 'PRUMan';
    }
    
// ===== Health & Long-term Income Protection =====
if (
    in_array($data['goal'], ['protection', 'savings']) &&
    $data['health_status'] !== 'good' &&
    $data['salary'] >= 3000 &&
    $data['coverage'] === 'lifetime'
) {
    $plans['Life'][] = 'PRULive Well';
}


    // ===== Remove duplicates =====
    foreach ($plans as $category => $list) {
        $plans[$category] = array_unique($list);
    }

    // ===== Only show plans relevant to the user's goal =====
    if ($data['goal'] === 'medical') {
        $plansToShow = $plans['Medical'];
    } elseif ($data['goal'] === 'critical_illness') {
        $plansToShow = $plans['Critical'];
    } else { // savings/protection
        $plansToShow = $plans['Life'];
    }

    // ===== Plan details =====
    $details = [
        'PRUTerm' => ['price' => 'RM100/month', 'desc' => 'Basic term life insurance plan.'],
        'PRUWith You Plus' => ['price' => 'Varies by age & options', 'desc' => 'Flexible investment-linked insurance for lifetime protection and long-term savings.'],
        'PRUMy Critical Care' => ['price' => 'Varies — contact us for a quote', 'desc' => 'Covers 160 types of critical illnesses with multiple claim opportunities and recovery support.'],
        'PRULady' => ['price' => 'Varies — contact us for a personalised quote', 'desc' => 'Comprehensive women’s protection covering female illnesses, maternity, and recovery benefits.'],
        'PRUMan' => ['price' => 'Varies — contact us for a personalised quote', 'desc' => 'Comprehensive men’s protection covering male illnesses and critical conditions.'],
        'PRUMillion Med' => ['price' => 'Price varies — depends on plan, deductible & age', 'desc' => 'Comprehensive hospitalisation protection with cashless admission and flexible benefits.'],
        'PRUMillion Med Active' => ['price' => '-', 'desc' => 'Active lifestyle hospitalisation plan with flexible benefits.'],
        'PRUValue Med' => ['price' => 'Price varies — depends on options and age', 'desc' => 'Flexible long-term hospitalisation and surgical plan with high coverage limits.'],
        'PRULive Well' => ['price' => 'Price varies — depends on options selected', 'desc' => 'Life insurance with wellness rewards and lifestyle benefits for health-conscious individuals.'],
    ];

    // Return to Blade view
    return view('user.recommendationresult', compact('plansToShow', 'data', 'details'));
}

}
