export type ID = string;

export type UserRole = "USER" | "ADMIN";

export interface User {
  id: ID;
  name: string;
  email: string;
  role: UserRole;
}

export interface AuthTokenResponse {
  accessToken: string;
  tokenType?: "Bearer";
  expiresInSeconds?: number;
}

export interface Category {
  id: ID;
  name: string;
}

export interface Destination {
  id: ID;
  name: string;
  description?: string;
  categoryId: ID;
  categoryName?: string;

  // opsional sesuai data tabel destinasi kamu
  location?: string;
  imageUrl?: string;
  // misal biaya dasar (kalau ada di DB)
  baseCost?: number;
}

export interface Itinerary {
  id: ID;
  userId: ID;
  name: string;
  startDate?: string; // ISO date
  endDate?: string; // ISO date
  createdAt?: string;
  updatedAt?: string;

  // ringkasan computed/hasil query
  totalCostEstimate?: number;
}

export interface ItineraryItem {
  id: ID;
  itineraryId: ID;
  destinationId: ID;
  destinationName?: string;

  dayIndex?: number; // mis: hari ke-n
  sortOrder?: number; // urutan dalam itinerary
  note?: string;
}

export interface CostBreakdownItem {
  label: string; // mis: "Beach A", "Transport", dll
  amount: number; // numeric total untuk item tsb
}

export interface CostEstimate {
  itineraryId: ID;
  total: number;
  currency?: string; // mis: "IDR"
  breakdown?: CostBreakdownItem[];
}
