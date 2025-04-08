--
-- PostgreSQL database dump
--

-- Dumped from database version 17.4 (Debian 17.4-1.pgdg120+2)
-- Dumped by pg_dump version 17.4

-- Started on 2025-04-08 11:41:08 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 220 (class 1259 OID 16396)
-- Name: cars; Type: TABLE; Schema: public; Owner: laravel
--

CREATE TABLE public.cars (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.cars OWNER TO laravel;

--
-- TOC entry 219 (class 1259 OID 16395)
-- Name: cars_id_seq; Type: SEQUENCE; Schema: public; Owner: laravel
--

CREATE SEQUENCE public.cars_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.cars_id_seq OWNER TO laravel;

--
-- TOC entry 3419 (class 0 OID 0)
-- Dependencies: 219
-- Name: cars_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laravel
--

ALTER SEQUENCE public.cars_id_seq OWNED BY public.cars.id;


--
-- TOC entry 226 (class 1259 OID 16422)
-- Name: configuration_options; Type: TABLE; Schema: public; Owner: laravel
--

CREATE TABLE public.configuration_options (
    id bigint NOT NULL,
    configuration_id bigint NOT NULL,
    option_id bigint NOT NULL
);


ALTER TABLE public.configuration_options OWNER TO laravel;

--
-- TOC entry 225 (class 1259 OID 16421)
-- Name: configuration_options_id_seq; Type: SEQUENCE; Schema: public; Owner: laravel
--

CREATE SEQUENCE public.configuration_options_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.configuration_options_id_seq OWNER TO laravel;

--
-- TOC entry 3420 (class 0 OID 0)
-- Dependencies: 225
-- Name: configuration_options_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laravel
--

ALTER SEQUENCE public.configuration_options_id_seq OWNED BY public.configuration_options.id;


--
-- TOC entry 224 (class 1259 OID 16410)
-- Name: configurations; Type: TABLE; Schema: public; Owner: laravel
--

CREATE TABLE public.configurations (
    id bigint NOT NULL,
    car_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.configurations OWNER TO laravel;

--
-- TOC entry 223 (class 1259 OID 16409)
-- Name: configurations_id_seq; Type: SEQUENCE; Schema: public; Owner: laravel
--

CREATE SEQUENCE public.configurations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.configurations_id_seq OWNER TO laravel;

--
-- TOC entry 3421 (class 0 OID 0)
-- Dependencies: 223
-- Name: configurations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laravel
--

ALTER SEQUENCE public.configurations_id_seq OWNED BY public.configurations.id;


--
-- TOC entry 218 (class 1259 OID 16389)
-- Name: migrations; Type: TABLE; Schema: public; Owner: laravel
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO laravel;

--
-- TOC entry 217 (class 1259 OID 16388)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: laravel
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO laravel;

--
-- TOC entry 3422 (class 0 OID 0)
-- Dependencies: 217
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laravel
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 222 (class 1259 OID 16403)
-- Name: options; Type: TABLE; Schema: public; Owner: laravel
--

CREATE TABLE public.options (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.options OWNER TO laravel;

--
-- TOC entry 221 (class 1259 OID 16402)
-- Name: options_id_seq; Type: SEQUENCE; Schema: public; Owner: laravel
--

CREATE SEQUENCE public.options_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.options_id_seq OWNER TO laravel;

--
-- TOC entry 3423 (class 0 OID 0)
-- Dependencies: 221
-- Name: options_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laravel
--

ALTER SEQUENCE public.options_id_seq OWNED BY public.options.id;


--
-- TOC entry 228 (class 1259 OID 16439)
-- Name: prices; Type: TABLE; Schema: public; Owner: laravel
--

CREATE TABLE public.prices (
    id bigint NOT NULL,
    configuration_id bigint NOT NULL,
    price numeric(10,2) NOT NULL,
    start_date date NOT NULL,
    end_date date NOT NULL
);


ALTER TABLE public.prices OWNER TO laravel;

--
-- TOC entry 227 (class 1259 OID 16438)
-- Name: prices_id_seq; Type: SEQUENCE; Schema: public; Owner: laravel
--

CREATE SEQUENCE public.prices_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.prices_id_seq OWNER TO laravel;

--
-- TOC entry 3424 (class 0 OID 0)
-- Dependencies: 227
-- Name: prices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laravel
--

ALTER SEQUENCE public.prices_id_seq OWNED BY public.prices.id;


--
-- TOC entry 3236 (class 2604 OID 16399)
-- Name: cars id; Type: DEFAULT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.cars ALTER COLUMN id SET DEFAULT nextval('public.cars_id_seq'::regclass);


--
-- TOC entry 3239 (class 2604 OID 16425)
-- Name: configuration_options id; Type: DEFAULT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.configuration_options ALTER COLUMN id SET DEFAULT nextval('public.configuration_options_id_seq'::regclass);


--
-- TOC entry 3238 (class 2604 OID 16413)
-- Name: configurations id; Type: DEFAULT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.configurations ALTER COLUMN id SET DEFAULT nextval('public.configurations_id_seq'::regclass);


--
-- TOC entry 3235 (class 2604 OID 16392)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 3237 (class 2604 OID 16406)
-- Name: options id; Type: DEFAULT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.options ALTER COLUMN id SET DEFAULT nextval('public.options_id_seq'::regclass);


--
-- TOC entry 3240 (class 2604 OID 16442)
-- Name: prices id; Type: DEFAULT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.prices ALTER COLUMN id SET DEFAULT nextval('public.prices_id_seq'::regclass);


--
-- TOC entry 3405 (class 0 OID 16396)
-- Dependencies: 220
-- Data for Name: cars; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.cars (id, name, created_at, updated_at) FROM stdin;
17	Atlas	2025-04-07 23:31:13	2025-04-07 23:31:13
18	Model Y	2025-04-07 23:31:13	2025-04-07 23:31:13
19	Toyota Yaris	2025-04-08 09:01:55	2025-04-08 09:01:55
\.


--
-- TOC entry 3411 (class 0 OID 16422)
-- Dependencies: 226
-- Data for Name: configuration_options; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.configuration_options (id, configuration_id, option_id) FROM stdin;
27	10	22
28	10	23
29	10	24
30	10	26
31	10	28
32	11	22
33	11	24
34	11	25
35	11	26
36	11	27
37	12	23
38	12	24
39	12	26
40	12	28
41	13	22
42	13	23
43	13	28
44	14	23
45	14	25
46	14	26
47	14	27
48	14	28
\.


--
-- TOC entry 3409 (class 0 OID 16410)
-- Dependencies: 224
-- Data for Name: configurations; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.configurations (id, car_id, name, created_at, updated_at) FROM stdin;
10	17	Люкс	2025-04-07 23:31:13	2025-04-07 23:31:13
11	17	Комфорт	2025-04-07 23:31:13	2025-04-07 23:31:13
12	17	Стандарт	2025-04-07 23:31:13	2025-04-07 23:31:13
13	18	Премиум	2025-04-07 23:31:14	2025-04-07 23:31:14
14	18	Премиум	2025-04-07 23:31:14	2025-04-07 23:31:14
\.


--
-- TOC entry 3403 (class 0 OID 16389)
-- Dependencies: 218
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2025_04_07_164123_create_cars_table	1
2	2025_04_07_164129_create_options_table	1
3	2025_04_07_164140_create_configurations_table	1
4	2025_04_07_164149_create_configuration_options_table	1
5	2025_04_07_164158_create_prices_table	1
\.


--
-- TOC entry 3407 (class 0 OID 16403)
-- Dependencies: 222
-- Data for Name: options; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.options (id, name, created_at, updated_at) FROM stdin;
22	Матовое покрытие	2025-04-07 23:31:13	2025-04-07 23:31:13
23	Спортивные диски	2025-04-07 23:31:13	2025-04-07 23:31:13
24	Кожаные сиденья	2025-04-07 23:31:13	2025-04-07 23:31:13
25	Вентиляция сидений	2025-04-07 23:31:13	2025-04-07 23:31:13
26	Автопилот	2025-04-07 23:31:13	2025-04-07 23:31:13
27	Подогрев сидений	2025-04-07 23:31:13	2025-04-07 23:31:13
28	Полный привод	2025-04-07 23:31:13	2025-04-07 23:31:13
\.


--
-- TOC entry 3413 (class 0 OID 16439)
-- Dependencies: 228
-- Data for Name: prices; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.prices (id, configuration_id, price, start_date, end_date) FROM stdin;
14	10	4923102.00	2025-05-11	2025-11-04
15	10	2868592.00	2026-03-30	2026-09-21
16	10	4667588.00	2024-06-29	2025-07-09
17	11	1997366.00	2024-08-09	2025-06-10
18	11	3363962.00	2024-12-20	2025-12-09
19	11	2994332.00	2024-10-01	2027-02-17
20	12	5019887.00	2025-08-18	2025-11-30
21	12	1978307.00	2025-08-12	2025-09-18
22	13	9192113.00	2025-11-12	2026-10-19
23	14	8052784.00	2024-11-11	2026-04-18
24	14	5369203.00	2026-01-01	2026-02-05
25	14	8676415.00	2025-07-23	2026-02-03
\.


--
-- TOC entry 3425 (class 0 OID 0)
-- Dependencies: 219
-- Name: cars_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.cars_id_seq', 19, true);


--
-- TOC entry 3426 (class 0 OID 0)
-- Dependencies: 225
-- Name: configuration_options_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.configuration_options_id_seq', 48, true);


--
-- TOC entry 3427 (class 0 OID 0)
-- Dependencies: 223
-- Name: configurations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.configurations_id_seq', 14, true);


--
-- TOC entry 3428 (class 0 OID 0)
-- Dependencies: 217
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.migrations_id_seq', 5, true);


--
-- TOC entry 3429 (class 0 OID 0)
-- Dependencies: 221
-- Name: options_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.options_id_seq', 28, true);


--
-- TOC entry 3430 (class 0 OID 0)
-- Dependencies: 227
-- Name: prices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.prices_id_seq', 25, true);


--
-- TOC entry 3244 (class 2606 OID 16401)
-- Name: cars cars_pkey; Type: CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT cars_pkey PRIMARY KEY (id);


--
-- TOC entry 3250 (class 2606 OID 16427)
-- Name: configuration_options configuration_options_pkey; Type: CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.configuration_options
    ADD CONSTRAINT configuration_options_pkey PRIMARY KEY (id);


--
-- TOC entry 3248 (class 2606 OID 16415)
-- Name: configurations configurations_pkey; Type: CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.configurations
    ADD CONSTRAINT configurations_pkey PRIMARY KEY (id);


--
-- TOC entry 3242 (class 2606 OID 16394)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 3246 (class 2606 OID 16408)
-- Name: options options_pkey; Type: CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.options
    ADD CONSTRAINT options_pkey PRIMARY KEY (id);


--
-- TOC entry 3252 (class 2606 OID 16444)
-- Name: prices prices_pkey; Type: CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.prices
    ADD CONSTRAINT prices_pkey PRIMARY KEY (id);


--
-- TOC entry 3254 (class 2606 OID 16428)
-- Name: configuration_options configuration_options_configuration_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.configuration_options
    ADD CONSTRAINT configuration_options_configuration_id_foreign FOREIGN KEY (configuration_id) REFERENCES public.configurations(id) ON DELETE CASCADE;


--
-- TOC entry 3255 (class 2606 OID 16433)
-- Name: configuration_options configuration_options_option_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.configuration_options
    ADD CONSTRAINT configuration_options_option_id_foreign FOREIGN KEY (option_id) REFERENCES public.options(id) ON DELETE CASCADE;


--
-- TOC entry 3253 (class 2606 OID 16416)
-- Name: configurations configurations_car_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.configurations
    ADD CONSTRAINT configurations_car_id_foreign FOREIGN KEY (car_id) REFERENCES public.cars(id) ON DELETE CASCADE;


--
-- TOC entry 3256 (class 2606 OID 16445)
-- Name: prices prices_configuration_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: laravel
--

ALTER TABLE ONLY public.prices
    ADD CONSTRAINT prices_configuration_id_foreign FOREIGN KEY (configuration_id) REFERENCES public.configurations(id) ON DELETE CASCADE;


-- Completed on 2025-04-08 11:41:08 UTC

--
-- PostgreSQL database dump complete
--

