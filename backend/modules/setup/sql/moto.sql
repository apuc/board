-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 29 2016 г., 13:13
-- Версия сервера: 5.5.45
-- Версия PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `carbax`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car_mark`
--

CREATE TABLE IF NOT EXISTS `car_mark` (
  `id_car_mark` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Название марки',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  `name_rus` varchar(255) DEFAULT NULL COMMENT 'Назв. рус.',
  PRIMARY KEY (`id_car_mark`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Марки автомобилей' AUTO_INCREMENT=3728 ;

--
-- Дамп данных таблицы `car_mark`
--

INSERT INTO `car_mark` (`id_car_mark`, `name`, `id_car_type`, `name_rus`) VALUES
(2081, 'ABM', 20, NULL),
(2082, 'CSR', 20, NULL),
(2083, 'IRBIS', 20, NULL),
(2084, 'MZ', 20, NULL),
(2085, 'SVM', 20, NULL),
(2086, 'Aermacchi', 20, NULL),
(2087, 'CZ', 20, NULL),
(2088, 'Iron Eagle', 20, NULL),
(2089, 'NCR', 20, NULL),
(2090, 'Swift', 20, NULL),
(2091, 'AJP', 20, NULL),
(2092, 'Daelim', 20, NULL),
(2093, 'Italjet', 20, NULL),
(2094, 'Neander', 20, NULL),
(2095, 'Sym', 20, NULL),
(2096, 'AJS', 20, NULL),
(2097, 'Dandy', 20, NULL),
(2098, 'Janus', 20, NULL),
(2099, 'Nexus', 20, NULL),
(2100, 'Tank Sports', 20, NULL),
(2101, 'Alfer', 20, NULL),
(2102, 'Defiant', 20, NULL),
(2103, 'Jawa', 20, NULL),
(2104, 'Nipponia', 20, NULL),
(2105, 'Titan', 20, NULL),
(2106, 'Amazonas', 20, NULL),
(2107, 'Derbi', 20, NULL),
(2108, 'Jawa-CZ', 20, NULL),
(2109, 'Norton', 20, NULL),
(2110, 'TM Racing', 20, NULL),
(2111, 'American Eagle', 20, NULL),
(2112, 'Desert Raven', 20, NULL),
(2113, 'Jialing', 20, NULL),
(2114, 'Omaks Motors', 20, NULL),
(2115, 'Tomos', 20, NULL),
(2116, 'American IronHorse', 20, NULL),
(2117, 'Dirtmax', 20, NULL),
(2118, 'Jianshe-Yamaha', 20, NULL),
(2119, 'Orange County Choppers', 20, NULL),
(2120, 'Tomoto', 20, NULL),
(2121, 'Apollo', 20, NULL),
(2122, 'DKW', 20, NULL),
(2123, 'Jincheng', 20, NULL),
(2124, 'Orion', 20, NULL),
(2125, 'Travertson', 20, NULL),
(2126, 'Aprilia', 20, NULL),
(2127, 'DM Telai', 20, NULL),
(2128, 'JMC', 20, NULL),
(2129, 'OSSA', 20, NULL),
(2130, 'Triumph', 20, NULL),
(2131, 'Ardie', 20, NULL),
(2132, 'Dnepr (Днепр)', 20, NULL),
(2133, 'Johnny Pag', 20, NULL),
(2134, 'Pagsta', 20, NULL),
(2135, 'Troll', 20, NULL),
(2136, 'Armada', 20, NULL),
(2137, 'Dodge', 20, NULL),
(2138, 'JRL', 20, NULL),
(2139, 'Pannonia', 20, NULL),
(2140, 'TVS', 20, NULL),
(2141, 'ATK', 20, NULL),
(2142, 'Donghai', 20, NULL),
(2143, 'Kangda', 20, NULL),
(2144, 'Patron', 20, NULL),
(2145, 'UM', 20, NULL),
(2146, 'Atlant', 20, NULL),
(2147, 'Ducar', 20, NULL),
(2148, 'Kanuni', 20, NULL),
(2149, 'PCW', 20, NULL),
(2150, 'Van Veen', 20, NULL),
(2151, 'Avantis', 20, NULL),
(2152, 'Ducati', 20, NULL),
(2153, 'Kawasaki', 20, NULL),
(2154, 'Peugeot', 20, NULL),
(2155, 'Vento', 20, NULL),
(2156, 'AVM', 20, NULL),
(2157, 'E.V.A.', 20, NULL),
(2158, 'Kaxa Motos', 20, NULL),
(2159, 'PGO', 20, NULL),
(2160, 'Vertemati', 20, NULL),
(2161, 'Azel', 20, NULL),
(2162, 'EBR', 20, NULL),
(2163, 'KAYO', 20, NULL),
(2164, 'Pioneer', 20, NULL),
(2165, 'Verucci', 20, NULL),
(2166, 'Bajaj', 20, NULL),
(2167, 'Ecosse', 20, NULL),
(2168, 'Keeway', 20, NULL),
(2169, 'Pitmoto', 20, NULL),
(2170, 'Victory', 20, NULL),
(2171, 'Baltmotors', 20, NULL),
(2172, 'Electric Motorsport', 20, NULL),
(2173, 'Kinlon Motors', 20, NULL),
(2174, 'Pitrace', 20, NULL),
(2175, 'Viper', 20, NULL),
(2176, 'BamX', 20, NULL),
(2177, 'Eurotex', 20, NULL),
(2178, 'Kramit', 20, NULL),
(2179, 'Pitsterpro', 20, NULL),
(2180, 'Virus', 20, NULL),
(2181, 'Bars', 20, NULL),
(2182, 'Excelsior-Henderson', 20, NULL),
(2183, 'Kreidler', 20, NULL),
(2184, 'Pocket Bike', 20, NULL),
(2185, 'Von Dutch', 20, NULL),
(2186, 'Benelli', 20, NULL),
(2187, 'Factory Bike', 20, NULL),
(2188, 'KTM', 20, NULL),
(2189, 'Polini', 20, NULL),
(2190, 'VOR', 20, NULL),
(2191, 'Beta', 20, NULL),
(2192, 'Falcon', 20, NULL),
(2193, 'KXD', 20, NULL),
(2194, 'Pony Motors', 20, NULL),
(2195, 'Voxan', 20, NULL),
(2196, 'Bifei', 20, NULL),
(2197, 'Fantic', 20, NULL),
(2198, 'Kymco', 20, NULL),
(2199, 'Praga', 20, NULL),
(2200, 'Vyrus', 20, NULL),
(2201, 'Big Bear Choppers', 20, NULL),
(2202, 'Fine Custom Mechanics', 20, NULL),
(2203, 'Laverda', 20, NULL),
(2204, 'PRC', 20, NULL),
(2205, 'Wakan', 20, NULL),
(2206, 'Big Dog Motorcycles', 20, NULL),
(2207, 'Fischer', 20, NULL),
(2208, 'Legend', 20, NULL),
(2209, 'PUCH', 20, NULL),
(2210, 'Wels', 20, NULL),
(2211, 'Bimota', 20, NULL),
(2212, 'Flyrite Choppers', 20, NULL),
(2213, 'Lem', 20, NULL),
(2214, 'QingQi', 20, NULL),
(2215, 'Wiztem', 20, NULL),
(2216, 'Blade', 20, NULL),
(2217, 'Forsage', 20, NULL),
(2218, 'Lifan', 20, NULL),
(2219, 'Qlink', 20, NULL),
(2220, 'Wuyi Wusheng Electric', 20, NULL),
(2221, 'Blata', 20, NULL),
(2222, 'Fosti', 20, NULL),
(2223, 'Magni', 20, NULL),
(2224, 'Racer', 20, NULL),
(2225, 'Xingfu', 20, NULL),
(2226, 'BM', 20, NULL),
(2227, 'Futong', 20, NULL),
(2228, 'Maico', 20, NULL),
(2229, 'Rajdoot', 20, NULL),
(2230, 'XingYue', 20, NULL),
(2231, 'BMC Choppers', 20, NULL),
(2232, 'G&G', 20, NULL),
(2233, 'Malaguti', 20, NULL),
(2234, 'Red Wing', 20, NULL),
(2235, 'Xispa', 20, NULL),
(2236, 'BMW', 20, NULL),
(2237, 'G-max', 20, NULL),
(2238, 'Malanca', 20, NULL),
(2239, 'Regal Raptor', 20, NULL),
(2240, 'Xmotos', 20, NULL),
(2241, 'Boom Trikes', 20, NULL),
(2242, 'GAS GAS', 20, NULL),
(2243, 'Matchless', 20, NULL),
(2244, 'Rewaco', 20, NULL),
(2245, 'Yamaha', 20, NULL),
(2246, 'Borile', 20, NULL),
(2247, 'Genata', 20, NULL),
(2248, 'MBK', 20, NULL),
(2249, 'Rhino', 20, NULL),
(2250, 'Yamasaki', 20, NULL),
(2251, 'Boss Hoss', 20, NULL),
(2252, 'Generic', 20, NULL),
(2253, 'MBS', 20, NULL),
(2254, 'Rieju', 20, NULL),
(2255, 'Yangtze', 20, NULL),
(2256, 'Brammo', 20, NULL),
(2257, 'Geon', 20, NULL),
(2258, 'Meqelli', 20, NULL),
(2259, 'Roehr', 20, NULL),
(2260, 'YCF', 20, NULL),
(2261, 'BRP', 20, NULL),
(2262, 'Ghezzi-Brian', 20, NULL),
(2263, 'Metrakit', 20, NULL),
(2264, 'Roxon', 20, NULL),
(2265, 'Zero', 20, NULL),
(2266, 'BSA', 20, NULL),
(2267, 'Gilera', 20, NULL),
(2268, 'Midual', 20, NULL),
(2269, 'Royal Enfield', 20, NULL),
(2270, 'Zongshen', 20, NULL),
(2271, 'BSE', 20, NULL),
(2272, 'Gryphon', 20, NULL),
(2273, 'Mikilon', 20, NULL),
(2274, 'Sachs', 20, NULL),
(2275, 'Zontes', 20, NULL),
(2276, 'BucciMoto', 20, NULL),
(2277, 'GX moto', 20, NULL),
(2278, 'Minsk (Минск)', 20, NULL),
(2279, 'Sagitta', 20, NULL),
(2280, 'Zundapp', 20, NULL),
(2281, 'Buell', 20, NULL),
(2282, 'Hanway', 20, NULL),
(2283, 'MM', 20, NULL),
(2284, 'Sanglas', 20, NULL),
(2285, 'Zweirad-Union', 20, NULL),
(2286, 'Bultaco', 20, NULL),
(2287, 'Haojin', 20, NULL),
(2288, 'Mondial', 20, NULL),
(2289, 'Saxon', 20, NULL),
(2290, 'Восход', 20, NULL),
(2291, 'Cagiva', 20, NULL),
(2292, 'Harley-Davidson', 20, NULL),
(2293, 'Montesa', 20, NULL),
(2294, 'Scorpa', 20, NULL),
(2295, 'Десна', 20, NULL),
(2296, 'Campagna', 20, NULL),
(2297, 'Hartford', 20, NULL),
(2298, 'Moto Guzzi', 20, NULL),
(2299, 'Senke', 20, NULL),
(2300, 'ЗиД', 20, NULL),
(2301, 'CCM', 20, NULL),
(2302, 'Headbanger', 20, NULL),
(2303, 'Moto Morini', 20, NULL),
(2304, 'Sherco', 20, NULL),
(2305, 'ИЖ', 20, NULL),
(2306, 'Centurion', 20, NULL),
(2307, 'Hercules', 20, NULL),
(2308, 'Motobi', 20, NULL),
(2309, 'Shineray', 20, NULL),
(2310, 'Китай (NoName)', 20, NULL),
(2311, 'CFMoto', 20, NULL),
(2312, 'Highland', 20, NULL),
(2313, 'Motoland', 20, NULL),
(2314, 'Siamoto', 20, NULL),
(2315, 'Ковровец', 20, NULL),
(2316, 'CH Racing', 20, NULL),
(2317, 'Honda', 20, NULL),
(2318, 'Motolevo', 20, NULL),
(2319, 'Simson', 20, NULL),
(2320, 'Куница', 20, NULL),
(2321, 'Chang-Jiang', 20, NULL),
(2322, 'Honling', 20, NULL),
(2323, 'Motorhispania', 20, NULL),
(2324, 'Skygo', 20, NULL),
(2325, 'ММЗ', 20, NULL),
(2326, 'Cobra', 20, NULL),
(2327, 'Horex', 20, NULL),
(2328, 'Mototrans', 20, NULL),
(2329, 'Solo', 20, NULL),
(2330, 'ПМЗ', 20, NULL),
(2331, 'Confederate', 20, NULL),
(2332, 'Husaberg', 20, NULL),
(2333, 'MTT', 20, NULL),
(2334, 'Star Motorcycles', 20, NULL),
(2335, 'ПП Мото', 20, NULL),
(2336, 'CPI', 20, NULL),
(2337, 'Husqvarna', 20, NULL),
(2338, 'Munch', 20, NULL),
(2339, 'Stels', 20, NULL),
(2340, 'Тула', 20, NULL),
(2341, 'CR&S', 20, NULL),
(2342, 'Hyosung', 20, NULL),
(2343, 'MuZ', 20, NULL),
(2344, 'Stingray', 20, NULL),
(2345, 'Урал', 20, NULL),
(2346, 'CRZ', 20, NULL),
(2347, 'Indian', 20, NULL),
(2348, 'MV Agusta', 20, NULL),
(2349, 'Suzuki', 20, NULL),
(2350, 'Adly', 21, NULL),
(2351, 'Carter', 21, NULL),
(2352, 'Khalex', 21, NULL),
(2353, 'PGO', 21, NULL),
(2354, 'Stingear', 21, NULL),
(2355, 'ASA', 21, NULL),
(2356, 'Dazon', 21, NULL),
(2357, 'Lantana', 21, NULL),
(2358, 'Polaris', 21, NULL),
(2359, 'Tomcar', 21, NULL),
(2360, 'Asiascooter', 21, NULL),
(2361, 'Forsage', 21, NULL),
(2362, 'Lizhong', 21, NULL),
(2363, 'RBC', 21, NULL),
(2364, 'XCar', 21, NULL),
(2365, 'BFR', 21, NULL),
(2366, 'Fun Cruiser', 21, NULL),
(2367, 'NBLuck', 21, NULL),
(2368, 'Renli', 21, NULL),
(2369, 'Zadira', 21, NULL),
(2370, 'BMGK', 21, NULL),
(2371, 'Hammerhead', 21, NULL),
(2372, 'Norster', 21, NULL),
(2373, 'Roxon', 21, NULL),
(2374, 'Кинешма', 21, NULL),
(2375, 'Bugfaster', 21, NULL),
(2376, 'Joyner', 21, NULL),
(2377, 'ODES', 21, NULL),
(2378, 'Secma', 21, NULL),
(2379, 'Спринт', 21, NULL),
(2380, 'Buggy Jump', 21, NULL),
(2381, 'Kandi', 21, NULL),
(2382, 'Oxobike', 21, NULL),
(2383, 'Stels', 21, NULL),
(2384, 'ABM', 22, NULL),
(2385, 'Dinli', 22, NULL),
(2386, 'Jianshe-Yamaha', 22, NULL),
(2387, 'New Force', 22, NULL),
(2388, 'Suzuki', 22, NULL),
(2389, 'Access', 22, NULL),
(2390, 'E-Moto', 22, NULL),
(2391, 'JinLing', 22, NULL),
(2392, 'Nexus', 22, NULL),
(2393, 'Sym', 22, NULL),
(2394, 'Adly', 22, NULL),
(2395, 'E-ton', 22, NULL),
(2396, 'Jordan Motor', 22, NULL),
(2397, 'Nissamaran', 22, NULL),
(2398, 'TGB', 22, NULL),
(2399, 'Aeon', 22, NULL),
(2400, 'Feishen', 22, NULL),
(2401, 'JS', 22, NULL),
(2402, 'Nitro', 22, NULL),
(2403, 'Tomoto', 22, NULL),
(2404, 'AIE Motor', 22, NULL),
(2405, 'Fighter', 22, NULL),
(2406, 'Kandi', 22, NULL),
(2407, 'Omaks Motors', 22, NULL),
(2408, 'Tramp', 22, NULL),
(2409, 'Applestone', 22, NULL),
(2410, 'Forever Joy', 22, NULL),
(2411, 'Kawasaki', 22, NULL),
(2412, 'Patron', 22, NULL),
(2413, 'UMC', 22, NULL),
(2414, 'Arctic Cat', 22, NULL),
(2415, 'Forsage', 22, NULL),
(2416, 'Kaxa Motos', 22, NULL),
(2417, 'PGO', 22, NULL),
(2418, 'Ural Motors', 22, NULL),
(2419, 'Arex', 22, NULL),
(2420, 'FOXER', 22, NULL),
(2421, 'Kazuma', 22, NULL),
(2422, 'Polar Fox', 22, NULL),
(2423, 'UVM', 22, NULL),
(2424, 'Armada', 22, NULL),
(2425, 'FYM', 22, NULL),
(2426, 'Keeway', 22, NULL),
(2427, 'Polaris', 22, NULL),
(2428, 'Vento', 22, NULL),
(2429, 'ASA', 22, NULL),
(2430, 'Gamax', 22, NULL),
(2431, 'Kinlon Motors', 22, NULL),
(2432, 'QingQi', 22, NULL),
(2433, 'Volteco', 22, NULL),
(2434, 'Asiascooter', 22, NULL),
(2435, 'Gibbs', 22, NULL),
(2436, 'KTM', 22, NULL),
(2437, 'QuadRaider', 22, NULL),
(2438, 'Wiztem', 22, NULL),
(2439, 'Avantis', 22, NULL),
(2440, 'Godzilla', 22, NULL),
(2441, 'Kubota', 22, NULL),
(2442, 'Raktor', 22, NULL),
(2443, 'Wyp-Motor', 22, NULL),
(2444, 'BASHAN', 22, NULL),
(2445, 'Goes', 22, NULL),
(2446, 'KXD', 22, NULL),
(2447, 'RC Juniorcars', 22, NULL),
(2448, 'XBH', 22, NULL),
(2449, 'Bison', 22, NULL),
(2450, 'Gryphon', 22, NULL),
(2451, 'Kymco', 22, NULL),
(2452, 'Reggy', 22, NULL),
(2453, 'Yamaha', 22, NULL),
(2454, 'Blade', 22, NULL),
(2455, 'Guowei', 22, NULL),
(2456, 'Lebedev garage', 22, NULL),
(2457, 'Sagitta', 22, NULL),
(2458, 'Zongshen', 22, NULL),
(2459, 'BM', 22, NULL),
(2460, 'Helper', 22, NULL),
(2461, 'Lifan', 22, NULL),
(2462, 'Shineray', 22, NULL),
(2463, 'АВДИС', 22, NULL),
(2464, 'BRP', 22, NULL),
(2465, 'HiSUN', 22, NULL),
(2466, 'Linhai-Yamaha', 22, NULL),
(2467, 'Simbel', 22, NULL),
(2468, 'ГЕРДАКАР', 22, NULL),
(2469, 'CECTEK', 22, NULL),
(2470, 'Honda', 22, NULL),
(2471, 'Lokker', 22, NULL),
(2472, 'SkyJet', 22, NULL),
(2473, 'ЗиД', 22, NULL),
(2474, 'CFMoto', 22, NULL),
(2475, 'Honling', 22, NULL),
(2476, 'Loncin', 22, NULL),
(2477, 'SPY', 22, NULL),
(2478, 'ИЖ', 22, NULL),
(2479, 'Comanche', 22, NULL),
(2480, 'Hors', 22, NULL),
(2481, 'Masai', 22, NULL),
(2482, 'Stels', 22, NULL),
(2483, 'Китай (NoName)', 22, NULL),
(2484, 'CPI', 22, NULL),
(2485, 'Hyosung', 22, NULL),
(2486, 'Megaactive', 22, NULL),
(2487, 'Stingear', 22, NULL),
(2488, 'Псковская Механика', 22, NULL),
(2489, 'Cub Cadet', 22, NULL),
(2490, 'IRBIS', 22, NULL),
(2491, 'Mike-motors', 22, NULL),
(2492, 'Strom', 22, NULL),
(2493, 'Русская Механика (RM)', 22, NULL),
(2494, 'Derbi', 22, NULL),
(2495, 'Jialing', 22, NULL),
(2496, 'MTZ', 22, NULL),
(2497, 'Sunner', 22, NULL),
(2498, 'ТМЗ', 22, NULL),
(2499, 'ABAT', 23, NULL),
(2500, 'Huatian', 23, NULL),
(2501, 'Quadro', 23, NULL),
(2502, 'ABM', 23, NULL),
(2503, 'Hyosung', 23, NULL),
(2504, 'Racer', 23, NULL),
(2505, 'Adly', 23, NULL),
(2506, 'IRBIS', 23, NULL),
(2507, 'Regal Raptor', 23, NULL),
(2508, 'Aprilia', 23, NULL),
(2509, 'Italjet', 23, NULL),
(2510, 'Reggy', 23, NULL),
(2511, 'Arex', 23, NULL),
(2512, 'Jetstar', 23, NULL),
(2513, 'RM-X', 23, NULL),
(2514, 'ASA', 23, NULL),
(2515, 'JinLing', 23, NULL),
(2516, 'Sachs', 23, NULL),
(2517, 'Atlant', 23, NULL),
(2518, 'Jmstar', 23, NULL),
(2519, 'Sachs Bikes', 23, NULL),
(2520, 'Ayron', 23, NULL),
(2521, 'Jonway', 23, NULL),
(2522, 'Sagitta', 23, NULL),
(2523, 'Azel', 23, NULL),
(2524, 'Jordan Motor', 23, NULL),
(2525, 'San Yang', 23, NULL),
(2526, 'Bajaj', 23, NULL),
(2527, 'Jumbo', 23, NULL),
(2528, 'Shunfeng', 23, NULL),
(2529, 'Baltmotors', 23, NULL),
(2530, 'Kanuni', 23, NULL),
(2531, 'Simbel', 23, NULL),
(2532, 'Baotian Scooters', 23, NULL),
(2533, 'Kawasaki', 23, NULL),
(2534, 'Skymoto', 23, NULL),
(2535, 'Benda', 23, NULL),
(2536, 'Keeway', 23, NULL),
(2537, 'Sonik', 23, NULL),
(2538, 'Benelli', 23, NULL),
(2539, 'Kinlon', 23, NULL),
(2540, 'Stels', 23, NULL),
(2541, 'Benzhou', 23, NULL),
(2542, 'Kreidler', 23, NULL),
(2543, 'Stingear', 23, NULL),
(2544, 'Beta', 23, NULL),
(2545, 'Kymco', 23, NULL),
(2546, 'Stingray', 23, NULL),
(2547, 'Blade', 23, NULL),
(2548, 'Lambretta', 23, NULL),
(2549, 'Strom', 23, NULL),
(2550, 'Blata', 23, NULL),
(2551, 'Leike', 23, NULL),
(2552, 'Sundiro', 23, NULL),
(2553, 'BM', 23, NULL),
(2554, 'Lifan', 23, NULL),
(2555, 'Suzuki', 23, NULL),
(2556, 'BMW', 23, NULL),
(2557, 'Lingben', 23, NULL),
(2558, 'Sym', 23, NULL),
(2559, 'BORMIO', 23, NULL),
(2560, 'Linhai-Yamaha', 23, NULL),
(2561, 'TaiLG', 23, NULL),
(2562, 'Brilus', 23, NULL),
(2563, 'Lintex', 23, NULL),
(2564, 'Tank Sports', 23, NULL),
(2565, 'Cagiva', 23, NULL),
(2566, 'Lizhong', 23, NULL),
(2567, 'TGB', 23, NULL),
(2568, 'CFMoto', 23, NULL),
(2569, 'LML', 23, NULL),
(2570, 'Tomos', 23, NULL),
(2571, 'City Jet', 23, NULL),
(2572, 'Loncin', 23, NULL),
(2573, 'Tornado', 23, NULL),
(2574, 'Corsa', 23, NULL),
(2575, 'Luyuan', 23, NULL),
(2576, 'Tosheen', 23, NULL),
(2577, 'CPI', 23, NULL),
(2578, 'Magnetmoto', 23, NULL),
(2579, 'TVS', 23, NULL),
(2580, 'Cronus', 23, NULL),
(2581, 'Malaguti', 23, NULL),
(2582, 'UM', 23, NULL),
(2583, 'Crosser', 23, NULL),
(2584, 'Matador', 23, NULL),
(2585, 'UMC', 23, NULL),
(2586, 'CSR', 23, NULL),
(2587, 'MBK', 23, NULL),
(2588, 'Vectrix', 23, NULL),
(2589, 'Daelim', 23, NULL),
(2590, 'Meiduo', 23, NULL),
(2591, 'Venta', 23, NULL),
(2592, 'Defiant', 23, NULL),
(2593, 'MGB', 23, NULL),
(2594, 'Vento', 23, NULL),
(2595, 'Derbi', 23, NULL),
(2596, 'Minsk (Минск)', 23, NULL),
(2597, 'Vespa', 23, NULL),
(2598, 'Di Blasi', 23, NULL),
(2599, 'Mosca', 23, NULL),
(2600, 'Viper', 23, NULL),
(2601, 'E-max', 23, NULL),
(2602, 'MotoFino', 23, NULL),
(2603, 'Wels', 23, NULL),
(2604, 'E-Moto', 23, NULL),
(2605, 'Motoforce', 23, NULL),
(2606, 'Yamaha', 23, NULL),
(2607, 'Ecobahn', 23, NULL),
(2608, 'Motoland', 23, NULL),
(2609, 'Yamasaki', 23, NULL),
(2610, 'Eurotex', 23, NULL),
(2611, 'Motolife', 23, NULL),
(2612, 'Yiben', 23, NULL),
(2613, 'Forsage', 23, NULL),
(2614, 'MotorBoard', 23, NULL),
(2615, 'Yinxiang', 23, NULL),
(2616, 'FYM', 23, NULL),
(2617, 'Motowell', 23, NULL),
(2618, 'ZEV', 23, NULL),
(2619, 'Garelli', 23, NULL),
(2620, 'Nexus', 23, NULL),
(2621, 'ZhiWei (Taizhou)', 23, NULL),
(2622, 'Geely', 23, NULL),
(2623, 'Nipponia', 23, NULL),
(2624, 'Zongshen', 23, NULL),
(2625, 'Generic', 23, NULL),
(2626, 'Omaks Motors', 23, NULL),
(2627, 'ВПМЗ (Молот)', 23, NULL),
(2628, 'Giantco', 23, NULL),
(2629, 'Opai', 23, NULL),
(2630, 'Вятка', 23, NULL),
(2631, 'Gilera', 23, NULL),
(2632, 'Patron', 23, NULL),
(2633, 'ЗиД', 23, NULL),
(2634, 'Gryphon', 23, NULL),
(2635, 'Peugeot', 23, NULL),
(2636, 'ИЖ', 23, NULL),
(2637, 'Guowei', 23, NULL),
(2638, 'PGO', 23, NULL),
(2639, 'Китай (NoName)', 23, NULL),
(2640, 'GX moto', 23, NULL),
(2641, 'Piaggio', 23, NULL),
(2642, 'КТ', 23, NULL),
(2643, 'Haobon', 23, NULL),
(2644, 'Pioneer', 23, NULL),
(2645, 'РМЗ', 23, NULL),
(2646, 'Honda', 23, NULL),
(2647, 'PUCH', 23, NULL),
(2648, 'С-Мото', 23, NULL),
(2649, 'Honling', 23, NULL),
(2650, 'QingQi', 23, NULL),
(2651, 'ТМЗ (Туламашзавод)', 23, NULL),
(2652, 'Hors', 23, NULL),
(2653, 'Qlink', 23, NULL),
(2654, 'Элит', 23, NULL),
(2655, 'Birel', 24, NULL),
(2656, 'CRG', 24, NULL),
(2657, 'MSKart', 24, NULL),
(2658, 'Rimo', 24, NULL),
(2659, 'Патриот', 24, NULL),
(2660, 'BRP', 24, NULL),
(2661, 'Forsage', 24, NULL),
(2662, 'Parolin', 24, NULL),
(2663, 'UVM', 24, NULL),
(2664, 'Agro', 25, NULL),
(2665, 'Ohara', 25, NULL),
(2666, 'Арктиктранс', 25, NULL),
(2667, 'НБЗ', 25, NULL),
(2668, 'Торэкс', 25, NULL),
(2669, 'Argo', 25, NULL),
(2670, 'Tinger', 25, NULL),
(2671, 'Беркут', 25, NULL),
(2672, 'Норд-Авто', 25, NULL),
(2673, 'Трансмаш', 25, NULL),
(2674, 'Bonai', 25, NULL),
(2675, 'Triton All', 25, NULL),
(2676, 'Бронто', 25, NULL),
(2677, 'НПО Вымпел', 25, NULL),
(2678, 'Трэкол', 25, NULL),
(2679, 'Centaur', 25, NULL),
(2680, 'Viking', 25, NULL),
(2681, 'ВТЗ', 25, NULL),
(2682, 'Русский Вездеход', 25, NULL),
(2683, 'Ухтыш', 25, NULL),
(2684, 'Hagglunds', 25, NULL),
(2685, 'Volvo', 25, NULL),
(2686, 'ГАЗ', 25, NULL),
(2687, 'СибВПКнефтегаз', 25, NULL),
(2688, 'Хищник', 25, NULL),
(2689, 'Hoot', 25, NULL),
(2690, 'Wild Panther', 25, NULL),
(2691, 'ГазСтройМашина', 25, NULL),
(2692, 'СМЗ', 25, NULL),
(2693, 'ЧЕТРА', 25, NULL),
(2694, 'Lebedev garage', 25, NULL),
(2695, 'XBH', 25, NULL),
(2696, 'ЗВМ', 25, NULL),
(2697, 'СпецТрансАвто', 25, NULL),
(2698, 'Шторм', 25, NULL),
(2699, 'Max', 25, NULL),
(2700, 'АвтоВАЗтранс', 25, NULL),
(2701, 'ЛТЗ', 25, NULL),
(2702, 'Стрелец', 25, NULL),
(2703, 'Экотранс', 25, NULL),
(2704, 'Mudd-Ox', 25, NULL),
(2705, 'Авторос', 25, NULL),
(2706, 'Механика', 25, NULL),
(2707, 'ТехУнэкс', 25, NULL),
(2708, 'ABM', 26, NULL),
(2709, 'BRP', 26, NULL),
(2710, 'Paxus', 26, NULL),
(2711, 'Wels', 26, NULL),
(2712, 'Псковская Механика', 26, NULL),
(2713, 'Alpina', 26, NULL),
(2714, 'Fast Trax', 26, NULL),
(2715, 'Pegas', 26, NULL),
(2716, 'Yamaha', 26, NULL),
(2717, 'Русская Механика (RM)', 26, NULL),
(2718, 'Arctic Cat', 26, NULL),
(2719, 'Fighter', 26, NULL),
(2720, 'Phantom Snowmobiles', 26, NULL),
(2721, 'Буран', 26, NULL),
(2722, 'Рысь', 26, NULL),
(2723, 'Armada', 26, NULL),
(2724, 'Fun&Tec', 26, NULL),
(2725, 'Polaris', 26, NULL),
(2726, 'ЗиД', 26, NULL),
(2727, 'Тайга', 26, NULL),
(2728, 'ASA', 26, NULL),
(2729, 'IRBIS', 26, NULL),
(2730, 'Simbel', 26, NULL),
(2731, 'Итлан', 26, NULL),
(2732, 'Хаски', 26, NULL),
(2733, 'BM', 26, NULL),
(2734, 'Manfred', 26, NULL),
(2735, 'Snow Hawk', 26, NULL),
(2736, 'МВП', 26, NULL),
(2737, 'ЯВТ', 26, NULL),
(2738, 'BMW Alpina', 26, NULL),
(2739, 'Patron', 26, NULL),
(2740, 'Stels', 26, NULL),
(2741, 'Пегас', 26, NULL),
(3582, 'Wels', 22, NULL),
(3583, 'Rex Moto', 23, NULL),
(3600, 'Витязь', 25, NULL),
(3613, 'Volteco', 23, NULL),
(3614, 'Восток Трейлер', 25, NULL),
(3615, 'Рубцовский машиностроительный завод', 25, NULL),
(3637, 'Buggyland', 21, NULL),
(3649, 'Upbeat (ABT)', 20, NULL),
(3688, 'TERRANICA', 25, NULL),
(3704, 'KAYO', 22, NULL),
(3726, 'VMC', 20, NULL),
(3727, 'Пелец', 25, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `car_type`
--

CREATE TABLE IF NOT EXISTS `car_type` (
  `id_car_type` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Название',
  PRIMARY KEY (`id_car_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Автомобильный сайт' AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `car_type`
--

INSERT INTO `car_type` (`id_car_type`, `name`) VALUES
(20, 'мотоциклы'),
(21, 'багги'),
(22, 'мотовездеходы'),
(23, 'скутеры'),
(24, 'картинг'),
(25, 'вездеходы-амфибии'),
(26, 'снегоходы');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;