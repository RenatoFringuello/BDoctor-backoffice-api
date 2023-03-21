<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
// use Faker\Generator as Faker;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Manfredi 3c",
                "telephone" => "079225521",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Manzoni 35",
                "telephone" => "07922552",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Verdi 1",
                "telephone" => "079225523",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Domenica 22",
                "telephone" => "079225524",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Roma 3",
                "telephone" => "079225525",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Dei Salici 7",
                "telephone" => "079225526",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Roma 23",
                "telephone" => "07922557",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Roma 3",
                "telephone" => "079225525",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Battista 2",
                "telephone" => "079225533",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Magellano 8",
                "telephone" => "079225528",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Roma 33",
                "telephone" => "079225825",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "vicolo Corto 3",
                "telephone" => "079225625",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "Parco della Vittoria 55",
                "telephone" => "079425525",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Impero 12",
                "telephone" => "079215525",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Accademia 66",
                "telephone" => "079225725",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Dei Gigli 1",
                "telephone" => "079229525",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Roma 3",
                "telephone" => "079225525",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Giulio Cesare 4",
                "telephone" => "079228525",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Università",
                "telephone" => "079225775",
            ],
            [
                "picture" => "https://i.pinimg.com/originals/38/49/47/38494781452e9bb758bbd2478f121501.png",
                "bio" => "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.",
                "curriculum" => "Curriculum",
                "services" => "Health care is delivered by health professionals and allied health fields. Medicine, dentistry, pharmacy, midwifery, nursing, optometry, audiology, psychology, occupational therapy, physical therapy, athletic training, and other health professions all constitute health care. It includes work done in providing primary care, secondary care, and tertiary care, as well as in public health. ",
                "address" => "via Gran Sasso 7",
                "telephone" => "079299525",
            ]
        ];
        foreach ($profiles as $profile) {
            $newProfile = new Profile();
            $newProfile->user_id = User::inRandomOrder()->first()->id;
            $newProfile->bio = $profile['bio'];
            $newProfile->picture = $profile['picture'];
            $newProfile->curriculum = $profile['curriculum'];
            $newProfile->services = $profile['services'];
            $newProfile->address = $profile['address'];
            $newProfile->telephone = $profile['telephone'];
            $newProfile->save();
        }
    }
}
